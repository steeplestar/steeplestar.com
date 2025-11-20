// ==========================================
// ZEITGEIST CLOUD V2.8.11
// GUARANTEED 40 WORDS ON ALL SCREENS
// Mid-range (Lumia) EDGE-TO-EDGE OPTIMIZATION
// + GIBBERISH FILTER
// + ACCESSIBILITY IMPROVEMENTS
// ✅ FIXED: Optimal keyboard navigation
// ==========================================

console.log("script.js is running! [V2.8.11 - HERO FOCUS TRAP]");

// ==========================================
// SUPABASE DATABASE SETUP
// ==========================================

import { createClient } from 'https://cdn.jsdelivr.net/npm/@supabase/supabase-js/+esm';

const SUPABASE_URL = "https://pnrcruvojjkgfljqmptn.supabase.co";
const SUPABASE_ANON_KEY = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6InBucmNydXZvamprZ2ZsanFtcHRuIiwicm9sZSI6ImFub24iLCJpYXQiOjE3Mzg3MTg5OTAsImV4cCI6MjA1NDI5NDk5MH0.S29su7hOZOLp7qhIgIPEfCuZXngoDs4dhKPBX_HFyOM";

const supabase = createClient(SUPABASE_URL, SUPABASE_ANON_KEY);

// ==========================================
// USER FEEDBACK MESSAGES
// ==========================================

const successMessages = [
  "🔥 Your word just made history!",
  "🚀 Word submitted! You're shaping the conversation!",
  "🎉 Great choice! Let's see what happens next!",
  "💡 Genius! The world needs more words like this!",
  "🌟 Boom! Your word is live in the Zeitgeist Cloud!",
  "💬 You spoke. The cloud listened!",
  "📢 Another voice added! Keep it going!",
  "🏆 Champion move! Your word is up!",
  "🎯 Spot on! That was a legendary word!",
  "✨ Poof! Magic happened. Your word is in!",
  "👑 Bow down! A masterpiece was just submitted!",
  "📱 Transmission received. The world sees your word!"
];

// Dynamic rate limiting messages with {MINUTES} placeholder
const rateLimitMessages = [
  "🕶️ Cool down, trendsetter. The spotlight will be yours again in {MINUTES} minutes.",
  "🚫 Only one word per hour. We know, it's hard to hold back the brilliance. Try again in {MINUTES} minutes.",
  "💤 Easy there, wordsmith. Come back in {MINUTES} minutes — the cloud needs a moment to digest.",
  "📭 The cloud's inbox is full. Check back in {MINUTES} minutes.",
  "🕵️ You've triggered the algorithm… better wait {MINUTES} minutes while we 'review your file'.",
  "📦 One word per hour! We're rationing brilliance here. {MINUTES} minutes to go.",
  "🧠 You're too fast for the Zeitgeist. Let it catch up in {MINUTES} minutes.",
  "🎙️ The mic drops once an hour. {MINUTES} minutes until your encore."
];

const bannedWordMessages = [
  "Yikes. Not happening.",
  "The Cloud shields itself from harsh words.",
  "This isn't that kind of party.",
  "The Cloud pretends it never heard that.",
  "Denied. The Cloud has standards.",
  "That one didn't fly. Aim higher.",
  "Embarrassing choice. Try again.",
  "Swing and a miss.",
  "Sad. Just sad."
];

// ==========================================
// 🆕 V2.8.6: GIBBERISH DETECTION MESSAGES
// ==========================================
const gibberishMessages = [
  "Hmm, that doesn't look like a real word. Try something else!",
  "Oops! That looks like keyboard mashing. Give us a real word!",
  "Nice try, but that's not quite a word. Try again!",
  "That doesn't appear to be a valid word. One more time!",
  "Looks like gibberish to us. Enter a real word!",
  "We're looking for actual words here. Give it another shot!",
  "Did your cat walk across the keyboard? Try a real word!",
  "That's not a word we recognize. How about something else?",
  "Random letters detected! Let's try a real word instead.",
  "Close, but that's not quite English. One more time!"
];

// ==========================================
// WORD CLOUD VISUAL CONFIGURATION
// ==========================================

const RESIZE_DEBOUNCE_MS = 150;
const CLOUD_OFFSET_Y = 50;

const debounce = (fn, ms = RESIZE_DEBOUNCE_MS) => {
  let t; 
  return (...args) => { 
    clearTimeout(t); 
    t = setTimeout(() => fn(...args), ms); 
  };
};

// ==========================================
// PROJECT CUEBALL - JUMP LINK FUNCTIONS
// ==========================================

function showJumpLinkPrompt() {
  const prompt = document.getElementById('cloud-action-prompt');
  if (!prompt) return;
  
  prompt.style.display = 'flex';
  requestAnimationFrame(() => {
    prompt.classList.add('show');
  });
}

function hideJumpLinkPrompt() {
  const prompt = document.getElementById('cloud-action-prompt');
  if (!prompt) return;
  
  prompt.classList.remove('show');
  prompt.style.display = 'none';
}

// ==========================================
// 🆕 V2.8.7: ACCESSIBILITY - HIDDEN WORD LIST
// ==========================================

/**
 * Creates a screen-reader-friendly list of all words
 * Invisible to sighted users, accessible to screen readers via list navigation
 * V2.8.9: Removed tabindex - screen readers navigate by landmark/list, not Tab key
 */
function updateAccessibleWordList(sorted) {
  const listContainer = document.getElementById('accessible-word-list');
  if (!listContainer) return;
  
  // Clear existing list
  listContainer.innerHTML = '';
  
  // Create list items for each word with rank and count
  sorted.forEach(([text, info], index) => {
    const li = document.createElement('li');
    // V2.8.9: Removed tabindex="0" - screen readers can access via list navigation (press "L")
    // This prevents keyboard users from tabbing through 40 invisible items
    
    const rank = index + 1;
    const label = rank === 1 
      ? `${text} - ${info.count} submissions (most popular)`
      : `${text} - ${info.count} submissions`;
    
    li.textContent = label;
    listContainer.appendChild(li);
  });
  
  console.log('✅ Accessible word list updated with ' + sorted.length + ' words (screen reader accessible)');
}

// ==========================================
// CLOUD MASK SYSTEM
// ==========================================

let cloudMaskPath = null;
let cloudMaskSVG = null;

function loadCloudMask() {
  fetch('images/cloud_shape.svg')
    .then(response => response.text())
    .then(svgText => {
      const parser = new DOMParser();
      const svgDoc = parser.parseFromString(svgText, 'image/svg+xml');
      const pathElement = svgDoc.querySelector('path');
      
      if (!pathElement) {
        console.warn('⚠️ No path in cloud_shape.svg');
        return;
      }
      
      cloudMaskSVG = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
      cloudMaskSVG.setAttribute('viewBox', '0 0 1000 800');
      cloudMaskSVG.style.position = 'fixed';
      cloudMaskSVG.style.top = '-9999px';
      cloudMaskSVG.style.left = '-9999px';
      cloudMaskSVG.style.width = '1px';
      cloudMaskSVG.style.height = '1px';
      cloudMaskSVG.style.overflow = 'hidden';
      cloudMaskSVG.style.pointerEvents = 'none';
      
      cloudMaskPath = pathElement.cloneNode(true);
      cloudMaskSVG.appendChild(cloudMaskPath);
      document.body.appendChild(cloudMaskSVG);
      
      console.log('✅ Cloud mask loaded');
    })
    .catch(err => {
      console.warn('⚠️ Mask loading failed:', err);
    });
}

function isPointInCloud(x, y, layoutWidth, layoutHeight) {
  if (!cloudMaskPath || !cloudMaskSVG) return true;
  
  const normalizedX = (x + layoutWidth / 2) / layoutWidth;
  const normalizedY = (y + layoutHeight / 2) / layoutHeight;
  
  const svgX = normalizedX * 1000;
  const svgY = normalizedY * 800;
  
  const point = cloudMaskSVG.createSVGPoint();
  point.x = svgX;
  point.y = svgY;
  
  return cloudMaskPath.isPointInFill(point);
}

/**
 * 🆕 V2.8.5: EDGE-TO-EDGE optimization with ultra-tight spacing
 */
function isWordInCloud(word, layoutWidth, layoutHeight, attempt = 1, minDim = 400) {
  if (!word.x || !word.y || !word.size) return true;
  if (!cloudMaskPath) return true;
  
  const avgCharWidth = word.size * 0.55;
  const width = word.text.length * avgCharWidth;
  const height = word.size * 1.2;
  
  // 🔧 V2.8.4: MATCH JIOPHONE BOOST - Mid-range now gets +3 (was +2)
  const isJioPhone = minDim <= 240;
  const isMidRange = minDim > 240 && minDim <= 360;
  const attemptBoost = isJioPhone ? 3 : isMidRange ? 3 : 0;
  const adjustedAttempt = Math.max(attempt + attemptBoost, 1);
  
  // 🎯 GRADUAL RELAXATION: Test fewer points as attempts increase
  if (adjustedAttempt >= 8) {
    // Attempt 8+: Only test center (most lenient)
    return isPointInCloud(word.x, word.y, layoutWidth, layoutHeight);
  } else if (adjustedAttempt >= 5) {
    // Attempt 5-7: Test center + left/right
    const testPoints = [
      { x: word.x, y: word.y },
      { x: word.x - width/2, y: word.y },
      { x: word.x + width/2, y: word.y }
    ];
    return testPoints.every(pt => isPointInCloud(pt.x, pt.y, layoutWidth, layoutHeight));
  } else {
    // Attempt 1-4: Test center + 3 edges
    const testPoints = [
      { x: word.x, y: word.y },
      { x: word.x - width/2, y: word.y },
      { x: word.x + width/2, y: word.y },
      { x: word.x, y: word.y - height/2 }
    ];
    return testPoints.every(pt => isPointInCloud(pt.x, pt.y, layoutWidth, layoutHeight));
  }
}

// ==========================================
// CONTENT-AWARE FONT SIZING
// ==========================================

function analyzeWordLengths(words) {
  const lengths = words.map(w => w.text.length);
  const avgLength = lengths.reduce((a, b) => a + b, 0) / lengths.length;
  const maxLength = Math.max(...lengths);
  const longWords = lengths.filter(l => l > 8).length;
  
  return {
    avgLength,
    maxLength,
    longWords,
    longWordRatio: longWords / words.length
  };
}

function calculateAdaptiveFontRatio(analysis, minDim) {
  let maxRatio = 0.095;
  
  // V2.8.5: Boost font sizes for mid-range to fill more space
  if (minDim > 240 && minDim <= 360) {
    maxRatio *= 1.05; // 5% larger fonts for mid-range
  }
  
  if (analysis.longWordRatio > 0.5) {
    maxRatio *= 0.90;
  } else if (analysis.longWordRatio > 0.35) {
    maxRatio *= 0.95;
  }
  
  if (analysis.avgLength > 9) {
    maxRatio *= 0.92;
  }
  
  return maxRatio;
}

// ==========================================
// TIER MULTIPLIER SYSTEM
// ==========================================

function getTierMultiplier(rank, minDim) {
  const crownBoost = minDim <= 240 ? 1.4 :
                     minDim >= 800 ? 2.2 :
                     1.4 + ((minDim - 240) / (800 - 240)) * 0.8;
  
  if (rank === 0) return crownBoost;
  
  const tierScale = minDim <= 240 ? 1.10 :
                    minDim >= 800 ? 1.0 :
                    1.0 + ((240 - minDim) / (800 - 240)) * 0.1;
  
  if (rank === 1) return 1.35 * tierScale;
  if (rank === 2) return 1.20 * tierScale;
  if (rank === 3) return 1.12 * tierScale;
  if (rank === 4) return 1.06 * tierScale;
  if (rank <= 9) return 1.03 * tierScale;
  if (rank <= 29) return 1.0;
  return 0.95;
}

// ==========================================
// WORD CLOUD SCALING & POSITIONING
// ==========================================

function fitCloudGroup() {
  const host = document.getElementById('wordsdisplay');
  if (!host) return;
  
  const svg = host.querySelector('svg');
  const g = host.querySelector('svg > g');
  if (!svg || !g) return;

  const { width: W, height: H } = svg.getBoundingClientRect();
  if (!W || !H) return;

  g.setAttribute('transform', 'translate(0,0)');
  const bb = g.getBBox();
  
  if (!isFinite(bb.width) || !isFinite(bb.height) || bb.width === 0 || bb.height === 0) {
    const minDim = Math.min(W, H);
    const offset = minDim <= 240 ? CLOUD_OFFSET_Y - 20 : 
                   minDim <= 360 ? CLOUD_OFFSET_Y - 10 :
                   CLOUD_OFFSET_Y;
    g.setAttribute('transform', `translate(${W/2},${H/2 + offset})`);
    return;
  }

  const padRatio = cloudMaskPath ? 0.98 : 0.86;  // V2.8.5: More aggressive (was 0.97)
  
  const innerW = W * padRatio;
  const innerH = H * padRatio;
  const s = Math.min(innerW / bb.width, innerH / bb.height, 1);

  const minDim = Math.min(W, H);
  const verticalOffset = minDim <= 240 ? CLOUD_OFFSET_Y - 15 : 
                        minDim <= 360 ? CLOUD_OFFSET_Y - 5 :
                        CLOUD_OFFSET_Y + 5;
  g.setAttribute('transform', `translate(${W/2},${H/2 + verticalOffset}) scale(${s})`);
}

// ==========================================
// 🆕 V2.8.5: GUARANTEED 40-WORD RENDERING
// EDGE-TO-EDGE FOR MID-RANGE (96%×88%)
// ==========================================

let _zg_sorted = null;

function renderCloudFromSorted(sorted, scaleMultiplier = 1.0, attempt = 1) {
  if (!sorted || !sorted.length) return;
  
  const container = d3.select("#wordsdisplay");
  container.selectAll("svg").remove();

  const width = container.node().clientWidth;
  const height = container.node().clientHeight;
  const minDim = Math.min(width, height);

  if (attempt === 1) {
    console.log(`Container: ${width}x${height}, minDim: ${minDim}`);
  }

  const counts = sorted.map(([, info]) => info.count);
  const [cMin, cMax] = d3.extent(counts);

  const wordList = sorted.map(([text]) => ({ text }));
  const analysis = analyzeWordLengths(wordList);
  
  if (attempt === 1) {
    console.log(`📊 Words: avg=${analysis.avgLength.toFixed(1)}, max=${analysis.maxLength}, ${(analysis.longWordRatio*100).toFixed(0)}% long`);
    if (minDim <= 240) {
      console.log(`📱 JioPhone: 97%×87% layout, tight spacing, +3 attempt boost`);
    } else if (minDim <= 360) {
      console.log(`📱 Mid-Range (Lumia): 96%×88% layout, ULTRA-TIGHT spacing (0.1px), +3 boost`);
    }
    console.log(`🎯 V2.8.9: Optimal keyboard navigation - Tab goes directly to input field!`);
  }

  const minFontSize = minDim * 0.055;
  const adaptiveMaxRatio = calculateAdaptiveFontRatio(analysis, minDim);
  const maxFontSize = minDim * adaptiveMaxRatio * scaleMultiplier;
  
  if (attempt > 1) {
    const boost = minDim <= 360 ? 3 : 0;  // V2.8.4: Both JioPhone AND mid-range get +3
    const adjustedAttempt = attempt + boost;
    const testPoints = adjustedAttempt >= 8 ? '1' : adjustedAttempt >= 5 ? '3' : '4';
    console.log(`🔄 Attempt ${attempt}: Max font ${maxFontSize.toFixed(1)}px, testing ${testPoints} point(s) (boost: +${boost})`);
  }

  const fontScale = d3.scaleSqrt()
    .domain([cMin || 1, cMax || 1])
    .range([minFontSize, maxFontSize]);

  const rankByText = new Map(sorted.map(([text], i) => [text, i]));

  const words = sorted.map(([text, info], idx) => ({
    text,
    count: info.count,
    size: fontScale(info.count) * getTierMultiplier(idx, minDim),
  }));

  const svg = container.append("svg").attr("width", width).attr("height", height);

  const cloudAspectRatio = 1000 / 800;
  let layoutWidth, layoutHeight;
  
  // 🎯 V2.8.5: EDGE-TO-EDGE for mid-range - maximum possible area
  if (minDim <= 240) {
    // JioPhone: Maximum layout area
    layoutWidth = width * 0.97;
    layoutHeight = height * 0.87;
  } else if (minDim <= 360) {
    // 🔧 MID-RANGE FIX: EDGE-TO-EDGE (was 97%×90%, now 96%×88%)
    layoutWidth = width * 0.96;
    layoutHeight = height * 0.88;
  } else if (width / height > cloudAspectRatio) {
    layoutHeight = height * 0.95;
    layoutWidth = layoutHeight * cloudAspectRatio;
  } else {
    layoutWidth = width * 0.95;
    layoutHeight = layoutWidth / cloudAspectRatio;
  }
  
  d3.layout.cloud()
    .size([layoutWidth, layoutHeight])
    .words(words.map(d => ({ ...d })))
    .padding(d => {
      // 🔧 V2.8.5: ULTRA-TIGHT SPACING - absolute minimum for edge-to-edge
      const crownPadding = minDim <= 240 ? 1.2 :
                          minDim <= 360 ? 0.6 :  // Was 0.8, now 0.6 (ULTRA-TIGHT)
                          minDim >= 800 ? 6 :
                          1.5 + ((minDim - 360) / (800 - 360)) * 4.5;
      
      const regularPadding = minDim <= 240 ? 0.4 :
                            minDim <= 360 ? 0.1 :  // Was 0.2, now 0.1 (ULTRA-TIGHT)
                            minDim >= 800 ? 3 :
                            0.6 + ((minDim - 360) / (800 - 360)) * 2.4;
      
      return rankByText.get(d.text) === 0 ? crownPadding : regularPadding;
    })
    .rotate(() => 0)
    .font("Poppins")
    .fontSize(d => d.size)
    .random(() => 0.5)
    .spiral("archimedean")
    .on("end", (placedWords) => drawCloud(placedWords, layoutWidth, layoutHeight, scaleMultiplier, attempt))
    .start();

function drawCloud(placedWords, layoutWidth, layoutHeight, scaleMultiplier, attempt) {
    // V2.8.5: Reduce vertical offset for mid-range to use more vertical space
    const verticalOffset = minDim <= 240 ? CLOUD_OFFSET_Y - 20 : 
                          minDim <= 360 ? CLOUD_OFFSET_Y - 10 :
                          CLOUD_OFFSET_Y;
    
    const g = svg.append("g")
      .attr("transform", `translate(${width/2},${height/2 + verticalOffset})`);

    let wordsToRender = placedWords;
    
    if (cloudMaskPath) {
      wordsToRender = placedWords.filter(w => isWordInCloud(w, layoutWidth, layoutHeight, attempt, minDim));
      
      const fitCount = wordsToRender.length;
      const targetCount = sorted.length;
      
      // 🎯 GUARANTEED 40: Keep trying with smaller fonts and more lenient testing
      if (fitCount < targetCount && attempt < 15) {
        console.warn(`⚠️ ${fitCount}/${targetCount} words fit - retrying (${attempt}/15)`);
        const newScale = scaleMultiplier * 0.98; // V2.8.5: Even faster shrink (was 0.985, now 0.98)
        renderCloudFromSorted(sorted, newScale, attempt + 1);
        return;
      }
      
      if (fitCount === targetCount) {
        console.log(`✅ SUCCESS! All ${fitCount} words fit after ${attempt} attempt(s)!`);
      } else {
        // Last resort: render all 40 anyway (better than missing words)
        console.warn(`⚠️ After 15 attempts: ${fitCount}/${targetCount}. Rendering all 40 anyway.`);
        wordsToRender = placedWords;
      }
    }

    wordsToRender.forEach((d) => {
      const rank = rankByText.get(d.text) ?? 999;
      
      const color =
        rank === 0 ? "#3D348B" :
        rank <= 4 ? "#2DA44E" :
        rank <= 9 ? "#006BFF" :
        rank <= 19 ? "#FF004D" :
        rank <= 29 ? "#481E14" :
        "#9195F6";

      g.append("text")
        .attr("text-anchor", "middle")
        .style("font-family", "Poppins")
        .style("font-size", `${d.size}px`)
        .style("fill", color)
        .attr("transform", `translate(${d.x || 0},${d.y || 0}) rotate(${d.rotate || 0})`)	
        .text(d.text)
        .on("mouseover", function() {
          const tooltip = document.getElementById('tooltip');
          if (!tooltip) return;
          tooltip.innerText = `${d.text}: ${d.count} submissions`;
          tooltip.style.display = "block";
        })
        .on("mousemove", e => {
          const tooltip = document.getElementById('tooltip');
          if (!tooltip) return;
          
          tooltip.style.display = "block";
          const tooltipRect = tooltip.getBoundingClientRect();
          const viewportWidth = window.innerWidth;
          const viewportHeight = window.innerHeight;
          
          const offsetX = 10;
          const offsetY = 10;
          
          let left = e.pageX + offsetX;
          let top = e.pageY + offsetY;
          
          if (left + tooltipRect.width > viewportWidth) {
            left = e.pageX - tooltipRect.width - offsetX;
          }
          if (top + tooltipRect.height > viewportHeight) {
            top = e.pageY - tooltipRect.height - offsetY;
          }
          if (left < 0) left = offsetX;
          if (top < 0) top = offsetY;
          
          tooltip.style.left = left + "px";
          tooltip.style.top = top + "px";
        })
        .on("mouseout", function() {
          const tooltip = document.getElementById('tooltip');
          if (tooltip) tooltip.style.display = "none";
        });
        // ✅ V2.8.8: Removed focus/blur handlers - visual cloud words are no longer keyboard-focusable
        // ✅ V2.8.9: Hidden list also no longer keyboard-focusable - screen readers access via list navigation
    });

    fitCloudGroup();
    
    // 🆕 V2.8.7: Update accessible word list for screen readers
    updateAccessibleWordList(sorted);
    
    // PROJECT CUEBALL: Show jump link after cloud renders
    setTimeout(() => {
      showJumpLinkPrompt();
    }, 500);
  }  
 }

// ==========================================
// HERO OVERLAY FUNCTIONALITY
// ==========================================

window.addEventListener("load", () => {
  const heroOverlay = document.getElementById("hero-overlay");
  const heroButton = document.getElementById("hero-proceed");

  if (heroOverlay && heroButton) {
    document.body.classList.add("hero-active");
    document.documentElement.classList.add("hero-active");

    setTimeout(() => {
      window.scrollTo({ top: document.body.scrollHeight, behavior: "auto" });
    }, 50);

    // ==========================================
    // FOCUS TRAPPING - Prevent escape from hero
    // ==========================================
    
    // Get all focusable elements in hero
    const focusableElements = heroOverlay.querySelectorAll(
      'a[href], button:not([disabled]), input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])'
    );
    const firstFocusable = focusableElements[0];
    const lastFocusable = focusableElements[focusableElements.length - 1];
    
    // Focus trap handler
    function trapFocus(e) {
      if (e.key !== 'Tab') return;
      
      if (e.shiftKey) {
        // Shift+Tab: If on first element, go to last
        if (document.activeElement === firstFocusable) {
          e.preventDefault();
          lastFocusable.focus();
        }
      } else {
        // Tab: If on last element, go to first
        if (document.activeElement === lastFocusable) {
          e.preventDefault();
          firstFocusable.focus();
        }
      }
    }
    
    // Enable focus trap
    document.addEventListener('keydown', trapFocus);
    
    // Focus first element in hero
    if (firstFocusable) {
      setTimeout(() => firstFocusable.focus(), 100);
    }

    heroButton.addEventListener("click", () => {
      // Immediately reveal page-wrapper so it's visible as hero slides away
      document.body.classList.remove("hero-active");
      document.documentElement.classList.remove("hero-active");
      
      // Unhide and re-enable main page content immediately
      const pageWrapper = document.querySelector('.page-wrapper');
      if (pageWrapper) {
        pageWrapper.setAttribute('aria-hidden', 'false');
        pageWrapper.removeAttribute('inert');
      }
      
      // Start hero slide-out animation
      heroOverlay.classList.add("slide-out");

      setTimeout(() => {
        // After animation completes, hide hero and clean up
        heroOverlay.style.display = "none";
        
        // Remove focus trap
        document.removeEventListener('keydown', trapFocus);
        
        window.scrollTo({ top: 0, behavior: "smooth" });
      }, 1000);
    });
  }
});

// ==========================================
// MAIN APPLICATION LOGIC
// ==========================================

document.addEventListener("DOMContentLoaded", () => {
  loadCloudMask();
  
  const wordForm = document.getElementById('wordform');
  const wordInput = document.getElementById('wordinput');
  const wordsDisplay = document.getElementById('wordsdisplay');
  const toastContainer = document.getElementById('toast-container');
  const hypeContainer = document.getElementById("hype-message-section");
  const displaySection = document.getElementById("display-section");
  const summonButton = document.getElementById("summon-button");
  const submitButton = document.getElementById('submitbutton');

  const tooltip = document.createElement('div');
  tooltip.id = 'tooltip';
  Object.assign(tooltip.style, {
    position: 'absolute', 
    pointerEvents: 'none', 
    padding: '4px 8px',
    background: 'rgba(0, 0, 0, 0.7)', 
    color: '#fff', 
    borderRadius: '4px',
    fontSize: '0.8rem', 
    display: 'none', 
    zIndex: '1000'
  });
  document.body.appendChild(tooltip);

  const hypeMessages = [
    "You're not alone—see what's on everyone's mind! The Zeitgeist Cloud will appear in just <span id='countdown'>5</span> seconds!",
    "The future is uncertain, but the Zeitgeist Cloud knows what's happening now! Revealing in <span id='countdown'>5</span> seconds!",
    "Hidden patterns… unexpected trends… What will the Zeitgeist Cloud reveal? Find out in <span id='countdown'>5</span> seconds!",
    "What secret thoughts will appear? The Zeitgeist Cloud is almost ready… Just <span id='countdown'>5</span> seconds to go!",
    "Hold onto your hats—the Zeitgeist Cloud is inflating! Ready for liftoff in <span id='countdown'>5</span> seconds!",
    "The words are rolling in… Will today's Zeitgeist Cloud surprise you? Let's find out in <span id='countdown'>5</span> seconds!"
  ];

  function showHypeMessage() {
    const msg = hypeMessages[Math.floor(Math.random() * hypeMessages.length)];
    hypeContainer.querySelector('#hype-message').innerHTML = msg;
    
    new Audio("sounds/lightning_sound.mp3").play().catch(() => {});

    let seconds = 5;
    const countdownSpan = () => document.getElementById("countdown");
    const timer = setInterval(() => {
      seconds--;
      if (countdownSpan()) countdownSpan().textContent = seconds;
      
      if (seconds <= 0) {
        clearInterval(timer);
        hypeContainer.style.display = "none";
        
        document.getElementById("windSound")?.play()
          .catch(err => console.error("❌ Wind sound error:", err));
        
        displaySection.style.display = "flex";
        
        setTimeout(fetchWords, 4200);
      }
    }, 1000);
  }

  displaySection.style.display = "none";
  
  summonButton.addEventListener("click", () => {
    summonButton.style.display = "none";
    hideJumpLinkPrompt(); // PROJECT CUEBALL: Hide when re-summoning
    showHypeMessage();
  });

  const errorMessage = document.createElement('div');
  errorMessage.id = 'error-message';
  wordForm.insertBefore(errorMessage, submitButton);

  function playSound(type) {
    new Audio(`sounds/${type}.mp3`).play()
      .catch(err => console.error("❌ Sound error:", err));
  }

  function showToast(message) {
    const toast = document.createElement('div');
    toast.className = 'toast';
    toast.innerText = message;
    toastContainer.appendChild(toast);
    
    setTimeout(() => {
      toast.classList.add('fade-out');
      setTimeout(() => toast.remove(), 1000);
    }, 5000);
  }

  function showInlineError(msg) {
    errorMessage.innerText = msg;
    errorMessage.style.display = 'block';
    setTimeout(() => errorMessage.style.display = 'none', 5000);
  }

  async function getUserIPHash() {
    try {
      const res = await fetch('https://api.ipify.org?format=json');
      const ip = (await res.json()).ip || "unknown";
      
      const digest = await crypto.subtle.digest('SHA-256', new TextEncoder().encode(ip));
      return Array.from(new Uint8Array(digest))
        .map(b => b.toString(16).padStart(2, '0'))
        .join('');
    } catch {
      return null;
    }
  }

  async function fetchWords() {
    const { data, error } = await supabase.rpc('get_all_words');

    if (error || !data) {
      console.error('❌ Error fetching words:', error);
      return;
    }

    const freqMap = new Map();
    data.forEach(({ word, submitted_at }) => {
      const w = word.toLowerCase();
      const t = new Date(submitted_at).getTime();
      
      if (!freqMap.has(w)) {
        freqMap.set(w, { count: 1, latest: t });
      } else {
        const info = freqMap.get(w);
        info.count++;
        info.latest = Math.max(info.latest, t);
      }
    });

    const sorted = Array.from(freqMap.entries())
      .sort(([, a], [, b]) => 
        b.count !== a.count ? b.count - a.count : b.latest - a.latest
      )
      .slice(0, 40);

    _zg_sorted = sorted;
    renderCloudFromSorted(sorted);
  }

  window.addEventListener('resize', debounce(() => {
    if (_zg_sorted) renderCloudFromSorted(_zg_sorted);
  }, RESIZE_DEBOUNCE_MS));

  wordForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    const rawInput = wordInput.value.trim();
    const word = rawInput.toLowerCase();
    
    const isValid = /^[a-z]{1,35}$/.test(word);
    if (!isValid) {
      playSound('error');
      showInlineError('❌ Word must be 1–35 lowercase letters (a–z) only.');
      return;
    }

    const userIPHash = await getUserIPHash();
    if (!userIPHash) return;

    // Call the updated function that returns JSONB
    const { data, error } = await supabase.rpc('secure_insert_word', { 
      word_input: word, 
      user_hash_input: userIPHash 
    });

    // Handle network/connection errors
    if (error) {
      playSound('error');
      showInlineError('❌ Connection error. Please try again.');
      console.error('RPC error:', error);
      return;
    }

    // Parse the response status
    const status = data?.status;

    if (status === 'banned_word') {
      playSound('error');
      showInlineError(bannedWordMessages[Math.floor(Math.random() * bannedWordMessages.length)]);
      return;
    }

    // ==========================================
    // 🆕 V2.8.6: GIBBERISH DETECTION
    // ==========================================
    if (status === 'gibberish') {
      playSound('error');
      showInlineError(gibberishMessages[Math.floor(Math.random() * gibberishMessages.length)]);
      return;
    }

    if (status === 'rate_limited') {
      const minutes = data.minutes_remaining || 60;
      const message = rateLimitMessages[Math.floor(Math.random() * rateLimitMessages.length)]
        .replace('{MINUTES}', minutes);
      playSound('error');
      showInlineError(message);
      return;
    }

    if (status === 'invalid_format') {
      playSound('error');
      showInlineError('❌ Word must be 1–35 lowercase letters (a–z) only.');
      return;
    }

    if (status === 'ok') {
      // Success!
      wordInput.value = '';
      fetchWords();
      
      playSound('success');
      showToast(successMessages[Math.floor(Math.random() * successMessages.length)]);
      return;
    }

    // Fallback for unknown status
    playSound('error');
    showInlineError('❌ Something went wrong. Please try again.');
  });

  // ==========================================
  // 🆕 V2.8.10: CONTRIBUTION WIDGET - KEYBOARD ACCESSIBLE
  // ==========================================

  const supportTrigger = document.getElementById('supportTrigger');
  const supportContent = document.getElementById('supportContent');

  if (supportTrigger && supportContent) {
    // Click handler (mouse and Enter/Space on button)
    supportTrigger.addEventListener('click', () => {
      const isExpanded = supportContent.style.display === 'block';
      supportContent.style.display = isExpanded ? 'none' : 'block';
      supportTrigger.classList.toggle('expanded');
      
      // Update ARIA attribute for screen readers
      supportTrigger.setAttribute('aria-expanded', !isExpanded);
    });
    
    // Keyboard handler for Escape key
    supportTrigger.addEventListener('keydown', (e) => {
      // Escape key closes the widget
      if (e.key === 'Escape' && supportContent.style.display === 'block') {
        supportContent.style.display = 'none';
        supportTrigger.classList.remove('expanded');
        supportTrigger.setAttribute('aria-expanded', 'false');
        supportTrigger.focus(); // Return focus to trigger
      }
    });
  }
  
  console.log('✅ V2.8.10: Contribution widget keyboard accessible!');
});