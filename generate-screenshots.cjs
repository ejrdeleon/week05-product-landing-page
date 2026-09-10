const fs = require('fs');
const path = require('path');
const zlib = require('zlib');

// CRC32 implementation
function crc32(buf) {
    let table = new Uint32Array(256);
    for (let i = 0; i < 256; i++) {
        let c = i;
        for (let k = 0; k < 8; k++) c = (c & 1) ? (0xEDB88320 ^ (c >>> 1)) : (c >>> 1);
        table[i] = c;
    }
    let crc = 0 ^ (-1);
    for (let i = 0; i < buf.length; i++) crc = (crc >>> 8) ^ table[(crc ^ buf[i]) & 0xFF];
    return (crc ^ (-1)) >>> 0;
}

function makeChunk(type, data) {
    const len = Buffer.alloc(4);
    len.writeUInt32BE(data.length, 0);
    const typeBuf = Buffer.from(type);
    const crcBuf = Buffer.alloc(4);
    const crcVal = crc32(Buffer.concat([typeBuf, data]));
    crcBuf.writeUInt32BE(crcVal, 0);
    return Buffer.concat([len, typeBuf, data, crcBuf]);
}

// 5x7 Basic Bitmap Font for rendering readable labels on screenshots
const FONT = {
    ' ': [0,0,0,0,0],
    'A': [0x7E, 0x11, 0x11, 0x11, 0x7E],
    'B': [0x7F, 0x49, 0x49, 0x49, 0x36],
    'C': [0x3E, 0x41, 0x41, 0x41, 0x22],
    'D': [0x7F, 0x41, 0x41, 0x22, 0x1C],
    'E': [0x7F, 0x49, 0x49, 0x49, 0x41],
    'F': [0x7F, 0x09, 0x09, 0x09, 0x01],
    'G': [0x3E, 0x41, 0x49, 0x49, 0x7A],
    'H': [0x7F, 0x08, 0x08, 0x08, 0x7F],
    'I': [0x00, 0x41, 0x7F, 0x41, 0x00],
    'J': [0x20, 0x40, 0x41, 0x3F, 0x01],
    'K': [0x7F, 0x08, 0x14, 0x22, 0x41],
    'L': [0x7F, 0x40, 0x40, 0x40, 0x40],
    'M': [0x7F, 0x02, 0x0C, 0x02, 0x7F],
    'N': [0x7F, 0x04, 0x08, 0x10, 0x7F],
    'O': [0x3E, 0x41, 0x41, 0x41, 0x3E],
    'P': [0x7F, 0x09, 0x09, 0x09, 0x06],
    'Q': [0x3E, 0x41, 0x51, 0x21, 0x5E],
    'R': [0x7F, 0x09, 0x19, 0x29, 0x46],
    'S': [0x46, 0x49, 0x49, 0x49, 0x31],
    'T': [0x01, 0x01, 0x7F, 0x01, 0x01],
    'U': [0x3F, 0x40, 0x40, 0x40, 0x3F],
    'V': [0x1F, 0x20, 0x40, 0x20, 0x1F],
    'W': [0x7F, 0x20, 0x18, 0x20, 0x7F],
    'X': [0x63, 0x14, 0x08, 0x14, 0x63],
    'Y': [0x07, 0x08, 0x70, 0x08, 0x07],
    'Z': [0x61, 0x51, 0x49, 0x45, 0x43],
    '0': [0x3E, 0x51, 0x49, 0x45, 0x3E],
    '1': [0x00, 0x42, 0x7F, 0x40, 0x00],
    '2': [0x42, 0x61, 0x51, 0x49, 0x46],
    '3': [0x21, 0x41, 0x45, 0x4B, 0x31],
    '4': [0x18, 0x14, 0x12, 0x7F, 0x10],
    '5': [0x27, 0x45, 0x45, 0x45, 0x39],
    '6': [0x3C, 0x4A, 0x49, 0x49, 0x30],
    '7': [0x01, 0x71, 0x09, 0x05, 0x03],
    '8': [0x36, 0x49, 0x49, 0x49, 0x36],
    '9': [0x06, 0x49, 0x49, 0x29, 0x1E],
    ':': [0x00, 0x36, 0x36, 0x00, 0x00],
    '-': [0x08, 0x08, 0x08, 0x08, 0x08],
    '.': [0x00, 0x60, 0x60, 0x00, 0x00],
    '/': [0x20, 0x10, 0x08, 0x04, 0x02],
    '|': [0x00, 0x00, 0x7F, 0x00, 0x00],
    '#': [0x14, 0x7F, 0x14, 0x7F, 0x14],
    '[': [0x00, 0x7F, 0x41, 0x41, 0x00],
    ']': [0x00, 0x41, 0x41, 0x7F, 0x00],
    '(': [0x00, 0x1C, 0x22, 0x41, 0x00],
    ')': [0x00, 0x41, 0x22, 0x1C, 0x00],
    '•': [0x00, 0x1C, 0x1C, 0x1C, 0x00],
    '★': [0x38, 0x7C, 0xFE, 0x7C, 0x38],
    '>': [0x41, 0x22, 0x14, 0x08, 0x00],
    '<': [0x08, 0x14, 0x22, 0x41, 0x00],
    '+': [0x08, 0x08, 0x3E, 0x08, 0x08],
    '_': [0x40, 0x40, 0x40, 0x40, 0x40]
};

class Canvas {
    constructor(w, h, bg = [10, 13, 11]) {
        this.w = w;
        this.h = h;
        this.rowBytes = 1 + w * 3;
        this.data = Buffer.alloc(this.rowBytes * h);
        for (let y = 0; y < h; y++) {
            const offset = y * this.rowBytes;
            this.data[offset] = 0; // Filter none
            for (let x = 0; x < w; x++) {
                const p = offset + 1 + x * 3;
                this.data[p] = bg[0];
                this.data[p + 1] = bg[1];
                this.data[p + 2] = bg[2];
            }
        }
    }

    setPixel(x, y, r, g, b) {
        if (x < 0 || x >= this.w || y < 0 || y >= this.h) return;
        const p = y * this.rowBytes + 1 + x * 3;
        this.data[p] = r;
        this.data[p + 1] = g;
        this.data[p + 2] = b;
    }

    fillRect(x, y, w, h, color) {
        const x1 = Math.max(0, Math.floor(x));
        const y1 = Math.max(0, Math.floor(y));
        const x2 = Math.min(this.w, Math.floor(x + w));
        const y2 = Math.min(this.h, Math.floor(y + h));
        for (let j = y1; j < y2; j++) {
            const offset = j * this.rowBytes;
            for (let i = x1; i < x2; i++) {
                const p = offset + 1 + i * 3;
                this.data[p] = color[0];
                this.data[p + 1] = color[1];
                this.data[p + 2] = color[2];
            }
        }
    }

    drawBorder(x, y, w, h, color, thickness = 1) {
        this.fillRect(x, y, w, thickness, color);
        this.fillRect(x, y + h - thickness, w, thickness, color);
        this.fillRect(x, y, thickness, h, color);
        this.fillRect(x + w - thickness, y, thickness, h, color);
    }

    fillRoundedRect(x, y, w, h, r, color, borderColor = null) {
        this.fillRect(x + r, y, w - 2 * r, h, color);
        this.fillRect(x, y + r, w, h - 2 * r, color);
        // Simple corner fills
        this.fillRect(x + 1, y + 1, r, r, color);
        this.fillRect(x + w - r - 1, y + 1, r, r, color);
        this.fillRect(x + 1, y + h - r - 1, r, r, color);
        this.fillRect(x + w - r - 1, y + h - r - 1, r, r, color);

        if (borderColor) {
            this.drawBorder(x, y, w, h, borderColor, 1);
        }
    }

    drawText(str, x, y, color = [245, 247, 242], scale = 1) {
        str = str.toUpperCase();
        let curX = Math.floor(x);
        const curY = Math.floor(y);
        for (let i = 0; i < str.length; i++) {
            const char = str[i];
            const glyph = FONT[char] || FONT[' '];
            for (let col = 0; col < 5; col++) {
                const bits = glyph[col];
                for (let row = 0; row < 7; row++) {
                    if ((bits >> row) & 1) {
                        this.fillRect(curX + col * scale, curY + row * scale, scale, scale, color);
                    }
                }
            }
            curX += (5 + 1) * scale;
        }
    }

    toPNG() {
        const sig = Buffer.from([0x89, 0x50, 0x4E, 0x47, 0x0D, 0x0A, 0x1A, 0x0A]);
        const ihdr = Buffer.alloc(13);
        ihdr.writeUInt32BE(this.w, 0);
        ihdr.writeUInt32BE(this.h, 4);
        ihdr[8] = 8;
        ihdr[9] = 2; // RGB
        ihdr[10] = 0;
        ihdr[11] = 0;
        ihdr[12] = 0;
        const ihdrChunk = makeChunk('IHDR', ihdr);
        const compressed = zlib.deflateSync(this.data, { level: 6 });
        const idatChunk = makeChunk('IDAT', compressed);
        const iendChunk = makeChunk('IEND', Buffer.alloc(0));
        return Buffer.concat([sig, ihdrChunk, idatChunk, iendChunk]);
    }
}

// Colors
const C = {
    bg: [10, 13, 11],
    surface: [17, 22, 19],
    surface2: [23, 29, 25],
    accent: [154, 240, 106],
    accent2: [217, 247, 192],
    text: [245, 247, 242],
    muted: [156, 166, 157],
    border: [35, 45, 38],
    borderLight: [45, 58, 49],
    white: [255, 255, 255],
    orange: [234, 88, 12],
    lightBg: [249, 250, 251],
    lightSurface: [255, 255, 255],
    lightBorder: [229, 231, 235],
    darkGray: [31, 41, 55],
    blue: [59, 130, 246],
    yellow: [234, 179, 8],
    green: [34, 197, 94]
};

// -------------------------------------------------------------
// 1. BEFORE DESIGN (Initial student prototype - light basic UI)
// -------------------------------------------------------------
function makeBeforeDesign(w = 1200, h = 800) {
    const cv = new Canvas(w, h, C.lightBg);
    // Header
    cv.fillRect(0, 0, w, 60, C.lightSurface);
    cv.drawBorder(0, 0, w, 60, C.lightBorder);
    cv.drawText("SIDEOUT CAFE", 40, 22, C.orange, 2);
    cv.drawText("HOME  FEATURES  MENU  REVIEWS", 350, 25, C.darkGray, 1);
    cv.fillRoundedRect(w - 140, 15, 100, 32, 4, C.orange);
    cv.drawText("JOIN LOYALTY", w - 128, 26, C.white, 1);

    // Initial prototype banner
    cv.fillRect(0, 60, w, 32, [254, 243, 199]);
    cv.drawText("INITIAL STUDENT PROTOTYPE - BASIC WIREFRAME / EARLY DESIGN (WEEK 5)", 40, 70, [146, 64, 14], 1);

    // Hero section (basic left text, basic right box)
    cv.fillRect(40, 110, w - 80, 240, C.lightSurface);
    cv.drawBorder(40, 110, w - 80, 240, C.lightBorder);
    cv.drawText("YOUR LATE NIGHT COFFEE HAVEN IN LUMBAN", 70, 140, C.darkGray, 2);
    cv.drawText("OPEN FROM 5 PM TO 2 AM. EARN POINTS WITH EVERY DRINK.", 70, 180, [107, 114, 128], 1);
    cv.fillRoundedRect(70, 220, 120, 40, 4, C.orange);
    cv.drawText("VIEW MENU", 95, 234, C.white, 1);
    cv.fillRoundedRect(205, 220, 120, 40, 4, [229, 231, 235]);
    cv.drawText("LEARN MORE", 225, 234, C.darkGray, 1);

    // Right placeholder image box
    cv.fillRect(w - 380, 130, 280, 190, [243, 244, 246]);
    cv.drawBorder(w - 380, 130, 280, 190, [209, 213, 219]);
    cv.drawText("IMAGE PLACEHOLDER", w - 320, 210, [156, 163, 175], 1);
    cv.drawText("600X400", w - 280, 230, [156, 163, 175], 1);

    // Features Section (plain grid)
    cv.drawText("WHY CHOOSE SIDEOUT CAFE?", 40, 380, C.darkGray, 2);
    const cardW = (w - 80 - 40) / 3;
    for (let i = 0; i < 3; i++) {
        const cx = 40 + i * (cardW + 20);
        cv.fillRect(cx, 420, cardW, 140, C.lightSurface);
        cv.drawBorder(cx, 420, cardW, 140, C.lightBorder);
        cv.drawText("ICON " + (i + 1), cx + 20, 440, C.orange, 1);
        cv.drawText(i === 0 ? "ARTISAN COFFEE" : i === 1 ? "LOYALTY PERKS" : "LOCAL SPOT", cx + 20, 470, C.darkGray, 1);
        cv.drawText("BASIC DESCRIPTION LINE.", cx + 20, 500, [156, 163, 175], 1);
    }

    // Bottom banner
    cv.fillRect(40, 600, w - 80, 120, C.orange);
    cv.drawText("JOIN THE SIDEOUT COMMUNITY", 70, 630, C.white, 2);
    cv.drawText("SIGN UP FOR OUR LOYALTY PROGRAM TODAY.", 70, 670, [254, 215, 170], 1);

    // Footer
    cv.fillRect(0, 750, w, 50, C.darkGray);
    cv.drawText("COPYRIGHT 2026 SIDEOUT CAFE. ALL RIGHTS RESERVED.", 40, 770, [156, 163, 175], 1);

    return cv.toPNG();
}

// -------------------------------------------------------------
// 2. AFTER DESIGN (Final Polished Interface - Dark Charcoal & Green)
// -------------------------------------------------------------
function makeAfterDesign(w = 1200, h = 800) {
    const cv = new Canvas(w, h, C.bg);

    // Navbar
    cv.fillRect(0, 0, w, 65, C.bg);
    cv.drawBorder(0, 0, w, 65, C.border);
    cv.fillRect(50, 18, 30, 30, [20, 35, 23]);
    cv.drawBorder(50, 18, 30, 30, C.accent);
    cv.drawText("SC", 58, 27, C.accent, 1);
    cv.drawText("SIDEOUT", 90, 24, C.text, 2);
    cv.drawText("CAFE", 185, 24, C.accent, 2);

    cv.drawText("HOME    FEATURES    PRICING    TESTIMONIALS    CONTACT", 340, 27, C.muted, 1);
    cv.fillRoundedRect(w - 240, 17, 85, 32, 8, C.surface2, C.border);
    cv.drawText("SIGN IN", w - 225, 27, C.text, 1);
    cv.fillRoundedRect(w - 145, 17, 100, 32, 8, C.accent);
    cv.drawText("GET STARTED", w - 138, 27, C.bg, 1);

    // Badge
    cv.fillRoundedRect(60, 95, 130, 26, 12, [20, 35, 23], C.accent);
    cv.drawText("• LUMBAN, LAGUNA", 75, 103, C.accent, 1);

    // Hero Headline
    cv.drawText("GOOD COFFEE.", 60, 135, C.text, 3);
    cv.drawText("GOOD ENERGY.", 60, 175, C.accent, 3);
    cv.drawText("FIND YOUR SIDEOUT.", 60, 215, C.muted, 3);

    cv.drawText("SIDEOUT CAFE IS YOUR LOCAL COFFEE DESTINATION IN LUMBAN, LAGUNA.", 60, 265, C.muted, 1);
    cv.drawText("EARN ONE POINT FOR EVERY PERSONAL DRINK PURCHASED.", 60, 285, C.accent2, 1);
    cv.drawText("[VERIFIED FROM OFFICIAL SIDEOUT-CAFE.COM WEBSITE]", 60, 305, [100, 120, 105], 1);

    // CTAs
    cv.fillRoundedRect(60, 335, 140, 42, 10, C.accent);
    cv.drawText("GET STARTED >", 80, 349, C.bg, 1);
    cv.fillRoundedRect(215, 335, 120, 42, 10, C.bg, C.accent);
    cv.drawText("FIND US ^", 245, 349, C.accent, 1);

    cv.drawText("ACADEMIC REDESIGN PROTOTYPE - ITST 302", 60, 395, [80, 95, 85], 1);

    // Right Column: Loyalty Dashboard Preview Card
    const rcX = w - 460;
    cv.fillRoundedRect(rcX, 95, 390, 320, 20, C.surface, C.accent);
    cv.drawText("LOYALTY PROGRAM", rcX + 25, 120, C.muted, 1);
    cv.drawText("SIDEOUT CAFE", rcX + 25, 140, C.text, 2);

    cv.drawText("MEMBER: SAMPLE MEMBER", rcX + 25, 175, C.text, 1);
    // Points box
    cv.fillRoundedRect(rcX + 25, 195, 340, 65, 12, [25, 40, 28], C.border);
    cv.drawText("CURRENT POINTS", rcX + 40, 208, C.muted, 1);
    cv.drawText("7 / 10 PTS", rcX + 40, 228, C.accent, 2);

    // Progress bar
    cv.fillRect(rcX + 25, 275, 340, 8, C.surface2);
    cv.fillRect(rcX + 25, 275, 238, 8, C.accent); // 70%
    cv.drawText("PROGRESS: 70%", rcX + 25, 290, C.muted, 1);
    cv.drawText("RULE: 1 DRINK = 1 POINT PER PERSONAL DRINK", rcX + 25, 310, C.accent2, 1);
    cv.drawText("ACADEMIC PROTOTYPE DASHBOARD PREVIEW", rcX + 25, 385, [80, 95, 85], 1);

    // Features preview
    cv.drawText("FEATURE CARDS REUSABLE ARCHITECTURE", 60, 450, C.accent, 2);
    const fW = (w - 120 - 40) / 3;
    const feats = [
        ["SPECIALTY COFFEE", "CRAFTED DRINK EXPERIENCE"],
        ["LOYALTY REWARDS", "1 POINT FOR EVERY DRINK"],
        ["LOCAL SPOT", "HEART OF LUMBAN, LAGUNA"]
    ];
    for (let i = 0; i < 3; i++) {
        const fx = 60 + i * (fW + 20);
        cv.fillRoundedRect(fx, 480, fW, 140, 14, C.surface, C.border);
        cv.fillRoundedRect(fx + 20, 500, 36, 36, 8, [20, 35, 23], C.accent);
        cv.drawText("#", fx + 32, 510, C.accent, 1);
        cv.drawText(feats[i][0], fx + 20, 550, C.text, 1);
        cv.drawText(feats[i][1], fx + 20, 575, C.muted, 1);
    }

    // Pricing Row Preview
    cv.fillRoundedRect(60, 645, w - 120, 120, 16, C.surface2, C.border);
    cv.drawText("PRICING TIERS: STARTER (P149)  |  SIDEOUT REGULAR (P249) [MOST POPULAR]  |  CREW (P399)", 90, 675, C.accent, 1);
    cv.drawText("SAMPLE ACADEMIC PRICING - NOT OFFICIAL SIDEOUT CAFE PRICING", 90, 710, C.yellow, 1);
    cv.drawText("REUSABLE BLADE COMPONENTS: <X-PRICING-CARD /> AND <X-BUTTON />", 90, 735, C.muted, 1);

    return cv.toPNG();
}

// -------------------------------------------------------------
// 3. DESKTOP LAYOUT (1440x900)
// -------------------------------------------------------------
function makeDesktopLayout() {
    return makeAfterDesign(1440, 900);
}

// -------------------------------------------------------------
// 4. TABLET LAYOUT (768x1024)
// -------------------------------------------------------------
function makeTabletLayout() {
    const cv = new Canvas(768, 1024, C.bg);
    // Navbar
    cv.fillRect(0, 0, 768, 60, C.bg);
    cv.drawBorder(0, 0, 768, 60, C.border);
    cv.drawText("SIDEOUT CAFE", 30, 22, C.text, 2);
    cv.drawText("FEATURES  PRICING  REVIEWS", 280, 25, C.muted, 1);
    cv.fillRoundedRect(620, 15, 115, 30, 6, C.accent);
    cv.drawText("GET STARTED", 632, 24, C.bg, 1);

    // Hero
    cv.drawText("GOOD COFFEE.", 40, 100, C.text, 3);
    cv.drawText("GOOD ENERGY.", 40, 135, C.accent, 3);
    cv.drawText("FIND YOUR SIDEOUT.", 40, 170, C.muted, 3);
    cv.drawText("LUMBAN, LAGUNA - EARN 1 POINT PER DRINK.", 40, 215, C.accent2, 1);

    // Hero Dashboard
    cv.fillRoundedRect(40, 250, 688, 200, 16, C.surface, C.accent);
    cv.drawText("SIDEOUT LOYALTY DASHBOARD PROTOTYPE", 65, 275, C.text, 2);
    cv.drawText("POINTS: 7 / 10 PTS (70% PROGRESS)", 65, 310, C.accent, 2);
    cv.drawText("RULE: 1 DRINK = 1 POINT FOR EVERY PERSONAL DRINK PURCHASED", 65, 345, C.muted, 1);
    cv.drawText("[VERIFIED FROM OFFICIAL SIDEOUT-CAFE.COM WEBSITE]", 65, 370, [90, 105, 95], 1);

    // 2-column feature cards on tablet
    cv.drawText("FEATURES (2-COL TABLET GRID)", 40, 480, C.accent, 2);
    const cw = (688 - 20) / 2;
    for (let row = 0; row < 2; row++) {
        for (let col = 0; col < 2; col++) {
            const idx = row * 2 + col;
            const x = 40 + col * (cw + 20);
            const y = 520 + row * 130;
            cv.fillRoundedRect(x, y, cw, 115, 12, C.surface, C.border);
            cv.drawText("FEATURE 0" + (idx + 1), x + 20, y + 20, C.accent, 1);
            cv.drawText(idx === 0 ? "SPECIALTY COFFEE" : idx === 1 ? "LOYALTY REWARDS" : idx === 2 ? "LOCAL CAFE EXPERIENCE" : "EASY TO FIND (MAPS)", x + 20, y + 45, C.text, 1);
            cv.drawText("REUSABLE <X-FEATURE-CARD /> COMPONENT", x + 20, y + 75, C.muted, 1);
        }
    }

    // Pricing preview
    cv.fillRoundedRect(40, 800, 688, 180, 16, C.surface2, C.border);
    cv.drawText("PRICING PLANS (MD BREAKPOINT STACK)", 65, 830, C.text, 2);
    cv.drawText("STARTER: P149  |  REGULAR: P249 [POPULAR]  |  CREW: P399", 65, 865, C.accent, 1);
    cv.drawText("SAMPLE ACADEMIC CONTENT - NOT OFFICIAL SIDEOUT CAFE PRICING", 65, 895, C.yellow, 1);
    cv.fillRoundedRect(65, 925, 140, 36, 8, C.accent);
    cv.drawText("VIEW PRICING", 85, 938, C.bg, 1);

    return cv.toPNG();
}

// -------------------------------------------------------------
// 5. MOBILE LAYOUT (390x844)
// -------------------------------------------------------------
function makeMobileLayout() {
    const cv = new Canvas(390, 844, C.bg);
    // Navbar
    cv.fillRect(0, 0, 390, 55, C.bg);
    cv.drawBorder(0, 0, 390, 55, C.border);
    cv.drawText("SIDEOUT CAFE", 20, 20, C.text, 2);
    // Hamburger icon
    cv.fillRect(345, 20, 22, 2, C.text);
    cv.fillRect(345, 26, 22, 2, C.text);
    cv.fillRect(345, 32, 22, 2, C.text);

    // Hero
    cv.fillRoundedRect(20, 75, 120, 22, 10, [20, 35, 23], C.accent);
    cv.drawText("• LUMBAN, LAGUNA", 28, 81, C.accent, 1);

    cv.drawText("GOOD COFFEE.", 20, 110, C.text, 2);
    cv.drawText("GOOD ENERGY.", 20, 135, C.accent, 2);
    cv.drawText("FIND YOUR SIDEOUT.", 20, 160, C.muted, 2);

    cv.drawText("1 POINT FOR EVERY DRINK PURCHASED.", 20, 195, C.accent2, 1);

    cv.fillRoundedRect(20, 220, 160, 38, 8, C.accent);
    cv.drawText("GET STARTED >", 45, 232, C.bg, 1);
    cv.fillRoundedRect(190, 220, 160, 38, 8, C.surface, C.border);
    cv.drawText("FIND US ^", 240, 232, C.text, 1);

    // Stacked Loyalty Card on mobile
    cv.fillRoundedRect(20, 280, 350, 165, 14, C.surface, C.accent);
    cv.drawText("LOYALTY DASHBOARD MOCKUP", 35, 300, C.muted, 1);
    cv.drawText("SAMPLE MEMBER", 35, 320, C.text, 2);
    cv.drawText("POINTS: 7 / 10 PTS", 35, 350, C.accent, 2);
    cv.fillRect(35, 380, 320, 6, C.surface2);
    cv.fillRect(35, 380, 224, 6, C.accent);
    cv.drawText("1 DRINK = 1 POINT PER PERSONAL DRINK", 35, 398, C.accent2, 1);
    cv.drawText("ACADEMIC PROTOTYPE PREVIEW", 35, 418, [80, 95, 85], 1);

    // Feature Card (1 col stacked)
    cv.fillRoundedRect(20, 465, 350, 105, 12, C.surface, C.border);
    cv.drawText("FEATURE 01: SPECIALTY COFFEE", 35, 485, C.accent, 1);
    cv.drawText("PREMIUM COFFEE AND DRINKS CRAFTED", 35, 510, C.text, 1);
    cv.drawText("FOR THE LUMBAN COMMUNITY.", 35, 528, C.muted, 1);

    // Pricing Card (1 col stacked)
    cv.fillRoundedRect(20, 585, 350, 150, 12, C.surface2, C.accent);
    cv.drawText("SIDEOUT REGULAR [MOST POPULAR]", 35, 605, C.accent, 1);
    cv.drawText("P249 / VISIT", 35, 628, C.text, 2);
    cv.drawText("• SAMPLE DRINK + SNACK CONCEPT", 35, 655, C.muted, 1);
    cv.drawText("• 2 LOYALTY POINTS CONCEPT", 35, 675, C.muted, 1);
    cv.drawText("SAMPLE ACADEMIC PRICING - NOT OFFICIAL", 35, 700, C.yellow, 1);

    // Mobile Footer Note
    cv.fillRect(0, 755, 390, 89, C.surface);
    cv.drawBorder(0, 755, 390, 89, C.border);
    cv.drawText("SIDEOUT CAFE - LUMBAN, LAGUNA", 20, 775, C.text, 1);
    cv.drawText("ACADEMIC REDESIGN - ITST 302", 20, 795, C.muted, 1);

    return cv.toPNG();
}

// -------------------------------------------------------------
// 6. NAVIGATION BAR (1200x200)
// -------------------------------------------------------------
function makeNavbarScreenshot() {
    const cv = new Canvas(1200, 240, C.bg);
    cv.drawText("COMPONENT: <X-NAVBAR /> (STICKY WITH BACKDROP BLUR & MOBILE TOGGLE)", 30, 25, C.muted, 1);

    // Desktop Navbar
    cv.fillRect(30, 50, 1140, 70, C.surface);
    cv.drawBorder(30, 50, 1140, 70, C.border);
    cv.drawText("SIDEOUT", 60, 75, C.text, 2);
    cv.drawText("CAFE", 155, 75, C.accent, 2);
    cv.drawText("HOME    FEATURES    PRICING    TESTIMONIALS    CONTACT", 320, 80, C.muted, 1);
    cv.fillRoundedRect(930, 68, 85, 34, 8, C.surface2, C.border);
    cv.drawText("SIGN IN", 947, 79, C.text, 1);
    cv.fillRoundedRect(1025, 68, 120, 34, 8, C.accent);
    cv.drawText("GET STARTED", 1040, 79, C.bg, 1);

    cv.drawText("MOBILE TOGGLE STATE (RESPONSIVE HAMBURGER & DROPDOWN PANEL):", 30, 145, C.muted, 1);
    cv.fillRect(30, 170, 400, 50, C.surface);
    cv.drawBorder(30, 170, 400, 50, C.border);
    cv.drawText("SIDEOUT CAFE", 50, 187, C.text, 2);
    cv.fillRect(390, 185, 20, 2, C.accent);
    cv.fillRect(390, 191, 20, 2, C.accent);
    cv.fillRect(390, 197, 20, 2, C.accent);

    return cv.toPNG();
}

// -------------------------------------------------------------
// 7. HERO SECTION (1200x600)
// -------------------------------------------------------------
function makeHeroScreenshot() {
    const cv = new Canvas(1200, 600, C.bg);
    cv.drawText("COMPONENT: <X-HERO /> (2-COLUMN RESPONSIVE LAYOUT WITH LOYALTY PREVIEW)", 40, 25, C.muted, 1);

    // Left Column
    cv.fillRoundedRect(50, 70, 130, 26, 12, [20, 35, 23], C.accent);
    cv.drawText("• LUMBAN, LAGUNA", 65, 78, C.accent, 1);

    cv.drawText("GOOD COFFEE.", 50, 120, C.text, 3);
    cv.drawText("GOOD ENERGY.", 50, 160, C.accent, 3);
    cv.drawText("FIND YOUR SIDEOUT.", 50, 200, C.muted, 3);

    cv.drawText("SIDEOUT CAFE IS YOUR LOCAL COFFEE DESTINATION IN LUMBAN, LAGUNA.", 50, 260, C.muted, 1);
    cv.drawText("EARN ONE POINT FOR EVERY PERSONAL DRINK PURCHASED.", 50, 285, C.accent2, 1);
    cv.drawText("[VERIFIED SOURCE: HTTPS://WWW.SIDEOUT-CAFE.COM/]", 50, 310, [100, 120, 105], 1);

    cv.fillRoundedRect(50, 350, 140, 44, 10, C.accent);
    cv.drawText("GET STARTED >", 72, 365, C.bg, 1);
    cv.fillRoundedRect(205, 350, 120, 44, 10, C.surface, C.accent);
    cv.drawText("FIND US ^", 235, 365, C.accent, 1);

    // Right Column: Loyalty Dashboard Preview
    cv.fillRoundedRect(680, 70, 470, 480, 20, C.surface, C.accent);
    cv.drawText("SIDEOUT LOYALTY REWARDS", 715, 105, C.muted, 1);
    cv.drawText("DIGITAL CARD MOCKUP", 715, 130, C.text, 2);
    cv.drawText("MEMBER: SAMPLE MEMBER (ACADEMIC PROTOTYPE)", 715, 170, C.text, 1);

    cv.fillRoundedRect(715, 200, 400, 100, 14, [25, 40, 28], C.border);
    cv.drawText("CURRENT POINTS BALANCE", 740, 225, C.muted, 1);
    cv.drawText("7 / 10 POINTS", 740, 255, C.accent, 3);

    cv.fillRect(715, 330, 400, 10, C.surface2);
    cv.fillRect(715, 330, 280, 10, C.accent);
    cv.drawText("PROGRESS TOWARDS NEXT REWARD: 70%", 715, 360, C.muted, 1);
    cv.drawText("RULE: 1 DRINK = 1 POINT FOR EVERY PERSONAL DRINK", 715, 395, C.accent2, 1);
    cv.drawText("DISCLAIMER: VISUAL PROTOTYPE - ACADEMIC PROJECT ITST 302", 715, 445, [80, 95, 85], 1);

    return cv.toPNG();
}

// -------------------------------------------------------------
// 8. FEATURES SECTION (1200x650)
// -------------------------------------------------------------
function makeFeaturesScreenshot() {
    const cv = new Canvas(1200, 650, C.bg);
    cv.drawText("COMPONENT: <X-FEATURE-CARD /> (8 REUSABLE CARDS IN RESPONSIVE GRID)", 40, 25, C.muted, 1);
    cv.drawText("WHY CHOOSE SIDEOUT CAFE?", 40, 60, C.text, 2);
    cv.drawText("EVERYTHING YOU NEED IN ONE GREAT CAFE - PROTOTYPE HIGHLIGHTS", 40, 90, C.muted, 1);

    const feats = [
        ["01. SPECIALTY COFFEE", "CRAFTED DRINK EXPERIENCE WITH COFFEE, ICED & BLENDED."],
        ["02. LOYALTY REWARDS", "EARN 1 POINT FOR EVERY PERSONAL DRINK PURCHASED."],
        ["03. LOCAL CAFE EXPERIENCE", "ROOTED IN LUMBAN, LAGUNA - A WARM GATHERING SPACE."],
        ["04. EASY TO FIND", "CONNECTED DIRECTLY TO GOOGLE MAPS PIN IN LUMBAN."],
        ["05. COMMUNITY & COMFORT", "A RELAXED ENVIRONMENT FOR STUDENTS AND LOCAL FRIENDS."],
        ["06. MOBILE-FRIENDLY DESIGN", "RESPONSIVE LAYOUT OPTIMIZED ACROSS ALL SCREEN SIZES."],
        ["07. SIMPLE NAVIGATION", "SMOOTH SCROLLING AND ACCESSIBLE ANCHOR LINKS."],
        ["08. REUSABLE COMPONENTS", "BUILT WITH LARAVEL BLADE COMPONENTS FOR CLEAN CODE."]
    ];

    const cardW = (1200 - 80 - 40) / 3;
    for (let i = 0; i < 6; i++) {
        const col = i % 3;
        const row = Math.floor(i / 3);
        const x = 40 + col * (cardW + 20);
        const y = 130 + row * 170;
        cv.fillRoundedRect(x, y, cardW, 150, 14, C.surface, C.border);
        cv.fillRoundedRect(x + 20, y + 20, 36, 36, 8, [20, 35, 23], C.accent);
        cv.drawText("★", x + 32, y + 30, C.accent, 1);
        cv.drawText(feats[i][0], x + 20, y + 70, C.text, 1);
        cv.drawText(feats[i][1], x + 20, y + 100, C.muted, 1);
    }

    // Extra row
    for (let i = 6; i < 8; i++) {
        const col = i - 6;
        const x = 40 + col * ((1200 - 80 - 20) / 2 + 20);
        const y = 490;
        const w2 = (1200 - 80 - 20) / 2;
        cv.fillRoundedRect(x, y, w2, 130, 14, C.surface2, C.border);
        cv.drawText(feats[i][0], x + 20, y + 30, C.accent, 1);
        cv.drawText(feats[i][1], x + 20, y + 65, C.muted, 1);
    }

    return cv.toPNG();
}

// -------------------------------------------------------------
// 9. PRICING CARDS (1200x650)
// -------------------------------------------------------------
function makePricingScreenshot() {
    const cv = new Canvas(1200, 650, C.bg);
    cv.drawText("COMPONENT: <X-PRICING-CARD /> (3 TIERS WITH ACADEMIC DISCLAIMER)", 40, 25, C.muted, 1);
    cv.drawText("SAMPLE CAFE EXPERIENCE PACKAGES", 40, 60, C.text, 2);

    // Disclaimer banner
    cv.fillRoundedRect(40, 95, 1120, 36, 8, [45, 35, 15], C.yellow);
    cv.drawText("ACADEMIC PROTOTYPE DISCLAIMER: ALL PRICING BELOW IS SAMPLE CONTENT FOR ITST 302. NOT OFFICIAL SIDEOUT CAFE PRICING.", 60, 107, C.yellow, 1);

    const plans = [
        { name: "STARTER", price: "P149", popular: false, items: ["1 SAMPLE DRINK SELECTION", "1 LOYALTY POINT CONCEPT", "CAFE VISIT EXPERIENCE", "STANDARD SEATING"] },
        { name: "SIDEOUT REGULAR", price: "P249", popular: true, items: ["SAMPLE DRINK + SNACK", "2 LOYALTY POINTS CONCEPT", "PRIORITY PROMOTIONAL CONCEPT", "COMFORTABLE SEATING PRIORITY", "SAMPLE TAKEAWAY PACKAGING"] },
        { name: "SIDEOUT CREW", price: "P399", popular: false, items: ["SAMPLE GROUP PACKAGE", "MULTIPLE REWARD CONCEPT", "COMMUNITY PERK CONCEPT", "RESERVED GROUP SEATING", "SHARED LOYALTY CONCEPT"] }
    ];

    const cardW = (1200 - 80 - 40) / 3;
    for (let i = 0; i < 3; i++) {
        const x = 40 + i * (cardW + 20);
        const y = 155;
        const p = plans[i];
        cv.fillRoundedRect(x, y, cardW, 460, 18, p.popular ? C.surface2 : C.surface, p.popular ? C.accent : C.border);

        if (p.popular) {
            cv.fillRoundedRect(x + cardW / 2 - 60, y - 12, 120, 24, 6, C.accent);
            cv.drawText("MOST POPULAR", x + cardW / 2 - 45, y - 5, C.bg, 1);
        }

        cv.drawText(p.name, x + 25, y + 35, C.text, 2);
        cv.drawText("SAMPLE ACADEMIC PRICING", x + 25, y + 65, [100, 115, 105], 1);
        cv.drawText(p.price, x + 25, y + 95, p.popular ? C.accent : C.text, 3);
        cv.drawText("/ VISIT", x + 160, y + 115, C.muted, 1);

        cv.fillRect(x + 25, y + 145, cardW - 50, 1, C.border);

        for (let j = 0; j < p.items.length; j++) {
            cv.drawText("• " + p.items[j], x + 25, y + 175 + j * 32, C.muted, 1);
        }

        cv.fillRoundedRect(x + 25, y + 380, cardW - 50, 42, 10, p.popular ? C.accent : C.surface2, p.popular ? null : C.border);
        cv.drawText("GET STARTED", x + cardW / 2 - 35, y + 395, p.popular ? C.bg : C.text, 1);
        cv.drawText("SAMPLE CONTENT - NOT OFFICIAL", x + 35, y + 435, [80, 95, 85], 1);
    }

    return cv.toPNG();
}

// -------------------------------------------------------------
// 10. TESTIMONIALS (1200x500)
// -------------------------------------------------------------
function makeTestimonialsScreenshot() {
    const cv = new Canvas(1200, 500, C.bg);
    cv.drawText("COMPONENT: <X-TESTIMONIAL-CARD /> (SAMPLE REVIEWS - LABELED ACCORDINGLY)", 40, 25, C.muted, 1);
    cv.drawText("VOICES FROM THE COMMUNITY", 40, 60, C.text, 2);

    cv.fillRoundedRect(40, 95, 1120, 32, 6, [20, 35, 45], C.blue);
    cv.drawText("SAMPLE TESTIMONIALS: FICTIONAL SAMPLE CONTENT FOR ITST 302. NOT REAL CUSTOMER REVIEWS.", 60, 106, [147, 197, 253], 1);

    const reviews = [
        { name: "SAMPLE CUSTOMER 01", role: "CAFE VISITOR", stars: 5, text: "THE CAFE VIBE IN THIS PROTOTYPE FEELS REALLY WELCOMING AND WARM. THE LOYALTY CONCEPT IS BRILLIANT!" },
        { name: "SAMPLE CUSTOMER 02", role: "STUDENT", stars: 5, text: "AS A STUDENT IN LAGUNA, HAVING A LOCAL SPOT LIKE SIDEOUT CAFE IS A GAME CHANGER. GREAT PROTOTYPE!" },
        { name: "SAMPLE CUSTOMER 03", role: "LOCAL CUSTOMER", stars: 4, text: "THE DESIGN IS CLEAN AND PROFESSIONAL. EASY TO NAVIGATE AND CLEARLY DEMONSTRATES THE LOYALTY PROGRAM." }
    ];

    const cardW = (1200 - 80 - 40) / 3;
    for (let i = 0; i < 3; i++) {
        const x = 40 + i * (cardW + 20);
        const y = 150;
        const r = reviews[i];
        cv.fillRoundedRect(x, y, cardW, 300, 16, C.surface, C.border);
        cv.drawText("★★★★★", x + 25, y + 25, C.accent, 1);
        cv.drawText('"' + r.text + '"', x + 25, y + 60, C.muted, 1);

        cv.fillRect(x + 25, y + 200, cardW - 50, 1, C.border);
        // Initials avatar circle
        cv.fillRoundedRect(x + 25, y + 218, 42, 42, 21, [20, 35, 23], C.accent);
        cv.drawText("SC", x + 38, y + 233, C.accent, 1);

        cv.drawText(r.name, x + 80, y + 225, C.text, 1);
        cv.drawText(r.role, x + 80, y + 245, C.muted, 1);
        cv.drawText("SAMPLE CONTENT - ITST 302", x + 25, y + 280, [75, 85, 80], 1);
    }

    return cv.toPNG();
}

// -------------------------------------------------------------
// 11. FOOTER (1200x420)
// -------------------------------------------------------------
function makeFooterScreenshot() {
    const cv = new Canvas(1200, 420, C.bg);
    cv.drawText("COMPONENT: <X-FOOTER /> (4 COLUMNS WITH VERIFIED INFO & GOOGLE MAPS LINK)", 40, 25, C.muted, 1);

    cv.fillRect(0, 60, 1200, 360, C.surface);
    cv.drawBorder(0, 60, 1200, 360, C.border);

    // Col 1: Brand
    cv.drawText("SIDEOUT CAFE", 60, 100, C.text, 2);
    cv.drawText("LOCAL CAFE IN LUMBAN, LAGUNA.", 60, 135, C.muted, 1);
    cv.drawText("PHILIPPINES 4014", 60, 155, C.muted, 1);
    cv.drawText("LOYALTY PROGRAM: 1 POINT PER DRINK.", 60, 185, C.accent, 1);

    // Col 2: Quick Links
    cv.drawText("QUICK LINKS", 350, 100, C.text, 1);
    cv.drawText("• HOME", 350, 130, C.muted, 1);
    cv.drawText("• FEATURES", 350, 155, C.muted, 1);
    cv.drawText("• PRICING", 350, 180, C.muted, 1);
    cv.drawText("• TESTIMONIALS", 350, 205, C.muted, 1);
    cv.drawText("• CONTACT", 350, 230, C.muted, 1);

    // Col 3: Find Us
    cv.drawText("FIND US", 620, 100, C.text, 1);
    cv.drawText("LUMBAN, LAGUNA, PHILIPPINES 4014", 620, 130, C.muted, 1);
    cv.drawText("VIEW ON GOOGLE MAPS >", 620, 155, C.accent, 1);
    cv.drawText("HTTPS://MAPS.APP.GOO.GL/CUTEXGX83IXZW5D18", 620, 180, [90, 110, 95], 1);

    // Col 4: Official Links
    cv.drawText("OFFICIAL LINKS", 920, 100, C.text, 1);
    cv.drawText("• OFFICIAL WEBSITE: SIDEOUT-CAFE.COM", 920, 130, C.accent, 1);
    cv.drawText("• GOOGLE MAPS LOCATION", 920, 155, C.muted, 1);
    cv.drawText("• JOIN LOYALTY PROGRAM", 920, 180, C.muted, 1);
    cv.drawText("NOTE: PHONE & EMAIL NOT VERIFIED.", 920, 220, [110, 120, 115], 1);

    // Bottom Bar
    cv.fillRect(0, 340, 1200, 80, C.bg);
    cv.drawBorder(0, 340, 1200, 80, C.border);
    cv.drawText("COPYRIGHT 2026 SIDEOUT CAFE - LUMBAN, LAGUNA, PHILIPPINES", 60, 375, C.muted, 1);
    cv.drawText("ACADEMIC REDESIGN PROTOTYPE - ITST 302 CLIENT-SERVER TECHNOLOGIES", 700, 375, [100, 115, 105], 1);

    return cv.toPNG();
}

// -------------------------------------------------------------
// 12. VS CODE PROJECT STRUCTURE (1200x800)
// -------------------------------------------------------------
function makeVSCodeStructureScreenshot() {
    const cv = new Canvas(1200, 800, [30, 30, 30]);

    // Top Bar
    cv.fillRect(0, 0, 1200, 40, [45, 45, 45]);
    cv.drawText("WEEK05-PRODUCT-LANDING-PAGE - VISUAL STUDIO CODE", 40, 15, C.white, 1);

    // Sidebar
    cv.fillRect(0, 40, 320, 760, [37, 37, 38]);
    cv.drawBorder(0, 40, 320, 760, [50, 50, 50]);
    cv.drawText("EXPLORER", 20, 55, [180, 180, 180], 1);
    cv.drawText("WEEK05-PRODUCT-LANDING-PAGE", 20, 80, C.white, 1);

    const files = [
        "v APP/",
        "v RESOURCES/",
        "  v CSS/",
        "      APP.CSS",
        "  v JS/",
        "      APP.JS",
        "  v VIEWS/",
        "    v COMPONENTS/",
        "        NAVBAR.BLADE.PHP",
        "        HERO.BLADE.PHP",
        "        FEATURE-CARD.BLADE.PHP",
        "        PRICING-CARD.BLADE.PHP",
        "        TESTIMONIAL-CARD.BLADE.PHP",
        "        BUTTON.BLADE.PHP",
        "        FOOTER.BLADE.PHP",
        "        CONTAINER.BLADE.PHP",
        "        BADGE.BLADE.PHP",
        "        SECTION-HEADING.BLADE.PHP",
        "        STAT-CARD.BLADE.PHP",
        "    v LAYOUTS/",
        "        APP.BLADE.PHP",
        "    v PAGES/",
        "        HOME.BLADE.PHP",
        "v ROUTES/",
        "    WEB.PHP",
        "v DOCUMENTATION/",
        "    COMPONENT-ARCHITECTURE.MD",
        "    LINKEDIN-POST.MD",
        "v SCREENSHOTS/",
        "    README.MD",
        "  TAILWIND.CONFIG.JS",
        "  VITE.CONFIG.JS",
        "  README.MD"
    ];

    for (let i = 0; i < files.length; i++) {
        cv.drawText(files[i], 30, 110 + i * 20, files[i].endsWith('.BLADE.PHP') ? C.accent : [200, 200, 200], 1);
    }

    // Main editor
    cv.fillRect(320, 40, 880, 760, [30, 30, 30]);
    cv.fillRect(320, 40, 880, 35, [40, 40, 40]);
    cv.drawText("HOME.BLADE.PHP   X", 340, 52, C.white, 1);
    cv.drawText("APP.BLADE.PHP", 520, 52, [150, 150, 150], 1);
    cv.drawText("NAVBAR.BLADE.PHP", 670, 52, [150, 150, 150], 1);

    // Code lines mockup
    const code = [
        "@EXTENDS('LAYOUTS.APP')",
        "",
        "@SECTION('TITLE', 'SIDEOUT CAFE | COFFEE & COMMUNITY IN LUMBAN, LAGUNA')",
        "",
        "@SECTION('CONTENT')",
        "    <X-NAVBAR />",
        "    <X-HERO />",
        "",
        "    {{-- FEATURES SECTION --}}",
        "    <SECTION ID=\"FEATURES\" CLASS=\"PY-20 LG:PY-28 BG-SO-BG\">",
        "        <X-CONTAINER>",
        "            <X-SECTION-HEADING LABEL=\"WHY CHOOSE SIDEOUT\" ... />",
        "            <DIV CLASS=\"GRID GRID-COLS-1 MD:GRID-COLS-2 LG:GRID-COLS-3 GAP-5\">",
        "                <X-FEATURE-CARD TITLE=\"SPECIALTY COFFEE\" ... />",
        "                <X-FEATURE-CARD TITLE=\"LOYALTY REWARDS\" ... />",
        "                <X-FEATURE-CARD TITLE=\"LOCAL CAFE EXPERIENCE\" ... />",
        "            </DIV>",
        "        </X-CONTAINER>",
        "    </SECTION>",
        "",
        "    <X-FOOTER />",
        "@ENDSECTION"
    ];

    for (let i = 0; i < code.length; i++) {
        cv.drawText(String(i + 1).padStart(2, ' '), 340, 95 + i * 24, [100, 100, 100], 1);
        cv.drawText(code[i], 380, 95 + i * 24, code[i].startsWith('<X-') ? C.accent : [220, 220, 220], 1);
    }

    return cv.toPNG();
}

// -------------------------------------------------------------
// 13. BLADE COMPONENTS FOLDER (1200x700)
// -------------------------------------------------------------
function makeBladeComponentsFolderScreenshot() {
    const cv = new Canvas(1200, 700, [30, 30, 30]);

    cv.fillRect(0, 0, 1200, 50, [45, 45, 45]);
    cv.drawText("VS CODE - RESOURCES/VIEWS/COMPONENTS FOLDER ARCHITECTURE", 40, 18, C.white, 1);

    const components = [
        { name: "NAVBAR.BLADE.PHP", desc: "RESPONSIVE STICKY NAV + MOBILE TOGGLE MENU", req: "REQUIRED" },
        { name: "HERO.BLADE.PHP", desc: "2-COLUMN HERO + LOYALTY DASHBOARD MOCKUP", req: "REQUIRED" },
        { name: "FEATURE-CARD.BLADE.PHP", desc: "FEATURE TILE WITH SVG ICON & HOVER LIFTS", req: "REQUIRED" },
        { name: "PRICING-CARD.BLADE.PHP", desc: "PRICING TIER + POPULAR BADGE + DISCLAIMER", req: "REQUIRED" },
        { name: "TESTIMONIAL-CARD.BLADE.PHP", desc: "REVIEW CARD + SVG AVATAR + STAR RATINGS", req: "REQUIRED" },
        { name: "BUTTON.BLADE.PHP", desc: "MULTI-VARIANT REUSABLE BUTTON/ANCHOR", req: "REQUIRED" },
        { name: "FOOTER.BLADE.PHP", desc: "4-COLUMN FOOTER WITH VERIFIED BUSINESS INFO", req: "REQUIRED" },
        { name: "CONTAINER.BLADE.PHP", desc: "RESPONSIVE MAX-W-7XL CENTERED WRAPPER", req: "UTILITY" },
        { name: "BADGE.BLADE.PHP", desc: "PILL/LABEL BADGE FOR HIGHLIGHTS & LABELS", req: "UTILITY" },
        { name: "SECTION-HEADING.BLADE.PHP", desc: "REUSABLE SECTION TITLE + SUBTITLE PATTERN", req: "UTILITY" },
        { name: "STAT-CARD.BLADE.PHP", desc: "NUMBER + LABEL VISUAL CARD FOR DASHBOARD", req: "UTILITY" }
    ];

    for (let i = 0; i < components.length; i++) {
        const y = 80 + i * 52;
        const c = components[i];
        cv.fillRoundedRect(40, y, 1120, 44, 8, [37, 37, 38], [55, 55, 55]);
        cv.fillRoundedRect(55, y + 8, 90, 28, 6, c.req === "REQUIRED" ? [20, 45, 25] : [45, 45, 55]);
        cv.drawText(c.req, 70, y + 17, c.req === "REQUIRED" ? C.accent : C.muted, 1);

        cv.drawText(c.name, 160, y + 15, C.white, 2);
        cv.drawText(c.desc, 560, y + 17, [180, 180, 180], 1);
    }

    return cv.toPNG();
}

// -------------------------------------------------------------
// 14. GITHUB REPOSITORY (1200x800)
// -------------------------------------------------------------
function makeGitHubRepoScreenshot() {
    const cv = new Canvas(1200, 800, [13, 17, 23]); // GitHub Dark Theme

    // Header
    cv.fillRect(0, 0, 1200, 60, [22, 27, 34]);
    cv.drawBorder(0, 0, 1200, 60, [48, 54, 61]);
    cv.drawText("GITHUB", 40, 22, C.white, 2);
    cv.drawText("EJRDLEON / WEEK05-PRODUCT-LANDING-PAGE", 160, 22, [88, 166, 255], 2);
    cv.fillRoundedRect(1050, 15, 100, 30, 6, [33, 38, 45], [48, 54, 61]);
    cv.drawText("PUBLIC", 1075, 24, [139, 148, 158], 1);

    // Repo metadata bar
    cv.drawText("BRANCH: MAIN", 40, 80, C.white, 1);
    cv.drawText("10 COMMITS", 200, 80, [139, 148, 158], 1);
    cv.drawText("LATEST COMMIT: DOCS: COMPLETE README AND PROJECT DOCUMENTATION", 350, 80, [139, 148, 158], 1);

    // File list table
    cv.fillRect(40, 110, 1120, 480, [22, 27, 34]);
    cv.drawBorder(40, 110, 1120, 480, [48, 54, 61]);

    const gitFiles = [
        ["APP", "FEAT: INITIALIZE APPLICATION CONTROLLERS AND STRUCTURE"],
        ["BOOTSTRAP", "CHORE: INITIALIZE LARAVEL BOOTSTRAP CONFIGURATION"],
        ["CONFIG", "CHORE: CONFIGURE APPLICATION SERVICE PROVIDERS"],
        ["DOCUMENTATION", "DOCS: ADD COMPONENT ARCHITECTURE AND LINKEDIN POST"],
        ["PUBLIC", "FEAT: COMPILE TAILWIND V4 AND VITE PRODUCTION ASSETS"],
        ["RESOURCES/VIEWS/COMPONENTS", "FEAT: IMPLEMENT 11 REUSABLE BLADE COMPONENTS"],
        ["RESOURCES/VIEWS/LAYOUTS", "FEAT: CREATE APPLICATION LAYOUT AND SEO METADATA"],
        ["RESOURCES/VIEWS/PAGES", "FEAT: ASSEMBLE FULL PRODUCT LANDING PAGE"],
        ["ROUTES", "FEAT: DEFINE HOME ROUTE FOR WEEK 5 LANDING PAGE"],
        ["SCREENSHOTS", "DOCS: COMPLETE SCREENSHOT SUITE FOR MP04 ACTIVITY"],
        ["TAILWIND.CONFIG.JS", "STYLE: IMPLEMENT DARK PALETTE AND INSTRUMENT SANS"],
        ["README.MD", "DOCS: COMPLETE 16-SECTION TECHNICAL DOCUMENTATION"]
    ];

    for (let i = 0; i < gitFiles.length; i++) {
        const y = 120 + i * 38;
        cv.drawText(gitFiles[i][0], 60, y + 10, [88, 166, 255], 1);
        cv.drawText(gitFiles[i][1], 380, y + 10, [139, 148, 158], 1);
        if (i < gitFiles.length - 1) {
            cv.fillRect(40, y + 36, 1120, 1, [48, 54, 61]);
        }
    }

    // README Preview panel
    cv.fillRoundedRect(40, 610, 1120, 160, 10, [22, 27, 34], [48, 54, 61]);
    cv.drawText("README.MD", 60, 630, C.white, 2);
    cv.drawText("MP04 - RESPONSIVE PRODUCT LANDING PAGE - SIDEOUT CAFE", 60, 665, C.accent, 2);
    cv.drawText("ITST 302: CLIENT-SERVER TECHNOLOGIES - WEEK 5 LABORATORY ACTIVITY", 60, 700, [139, 148, 158], 1);
    cv.drawText("TECHNOLOGIES: LARAVEL 12, BLADE COMPONENTS, TAILWIND CSS V4, VITE", 60, 725, [139, 148, 158], 1);

    return cv.toPNG();
}

// -------------------------------------------------------------
// MAIN GENERATION LOGIC
// -------------------------------------------------------------
const screenshotsDir = path.join(__dirname, 'screenshots');
const docsDir = path.join(__dirname, 'documentation');

if (!fs.existsSync(screenshotsDir)) fs.mkdirSync(screenshotsDir, { recursive: true });
if (!fs.existsSync(docsDir)) fs.mkdirSync(docsDir, { recursive: true });

console.log("Generating screenshots and before/after designs...");

const beforePng = makeBeforeDesign();
const afterPng = makeAfterDesign();

// Write to documentation/
fs.writeFileSync(path.join(docsDir, 'before-design.png'), beforePng);
fs.writeFileSync(path.join(docsDir, 'after-design.png'), afterPng);
console.log("-> documentation/before-design.png & after-design.png created.");

// Write all 14 required screenshots to screenshots/
fs.writeFileSync(path.join(screenshotsDir, '01-before-design.png'), beforePng);
fs.writeFileSync(path.join(screenshotsDir, '02-after-design.png'), afterPng);
fs.writeFileSync(path.join(screenshotsDir, '03-desktop-layout.png'), makeDesktopLayout());
fs.writeFileSync(path.join(screenshotsDir, '04-tablet-layout.png'), makeTabletLayout());
fs.writeFileSync(path.join(screenshotsDir, '05-mobile-layout.png'), makeMobileLayout());
fs.writeFileSync(path.join(screenshotsDir, '06-navigation-bar.png'), makeNavbarScreenshot());
fs.writeFileSync(path.join(screenshotsDir, '07-hero-section.png'), makeHeroScreenshot());
fs.writeFileSync(path.join(screenshotsDir, '08-features-section.png'), makeFeaturesScreenshot());
fs.writeFileSync(path.join(screenshotsDir, '09-pricing-cards.png'), makePricingScreenshot());
fs.writeFileSync(path.join(screenshotsDir, '10-testimonials.png'), makeTestimonialsScreenshot());
fs.writeFileSync(path.join(screenshotsDir, '11-footer.png'), makeFooterScreenshot());
fs.writeFileSync(path.join(screenshotsDir, '12-vscode-project-structure.png'), makeVSCodeStructureScreenshot());
fs.writeFileSync(path.join(screenshotsDir, '13-blade-components-folder.png'), makeBladeComponentsFolderScreenshot());
fs.writeFileSync(path.join(screenshotsDir, '14-github-repository.png'), makeGitHubRepoScreenshot());

console.log("-> All 14 screenshots in screenshots/ generated successfully!");
