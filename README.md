# L.I.M.E

A dark, cyber/industrial-themed job platform front end. Static HTML/CSS/JS — no build step, no framework, no server required.

## Running it

There's no bundler or dev server. Open any page directly in a browser, starting with:

```
LIMELOGIN.html
```

or `LIMESIGNUP.html`. From there, the shared navigation carries you through the rest of the authenticated app.

## Pages

| File | Page | Notes |
|---|---|---|
| `LIMELOGIN.html` | Login | No nav (unauthenticated) |
| `LIMESIGNUP.html` | Sign up | No nav (unauthenticated) |
| `LIMEDASHBOARD.html` | Dashboard | |
| `LIMESEARCH.html` | Job search | |
| `LIMEMESSAGES.html` | Messages | |
| `LIMEAPPLICATION.html` | My Applications | Tracks application status |
| `LIMEPORTFOLIOPROJECTS.html` | Portfolio | Project carousel |
| `LIMEPROFILE.html` | Profile | |
| `LIMERESUME.html` | Resume | |
| `LIMESAVEDJOBS.html` | Saved Jobs | |
| `LIMENOTIFICATIONS.html` | Notifications | |
| `LIMESETTINGS.html` | Settings | Account / Privacy / Notifications / Display tabs |
| `LIMEMOCKCOMPANY.html` | Company profile | No nav item highlighted (not in canonical nav order) |

## Shared assets (single source of truth)

Every authenticated page pulls from the same set of shared files — edit these once, and it updates everywhere:

- **`lime-nav.css` / `lime-nav.js`** — the one canonical navigation component. `lime-nav.js` injects the nav into any page with `<div id="lime-nav-root"></div>`, highlights the active link automatically based on the current filename, and handles the mobile hamburger menu + user dropdown. Primary links (Dashboard, Search, Messages, Applications, Portfolio) show directly; secondary links (Profile, Resume, Settings, Notifications, Saved Jobs) live under the account dropdown.
- **`lime-background.css`** — the site-wide background treatment: `LIMEBGPIC.jpg`, fixed and centered, with a dark gradient overlay for text contrast. Applied via `<div class="lime-bg-image">` + `<div class="lime-bg-overlay">`, both `position: fixed` at `z-index: 0`. Page content sits in containers with `z-index: 1` on top.
- **`lime-applications-helper.js`** — `applyToJob()`, `hasApplied()`, and the shared `showToast()` notification system (used for save/apply/delete confirmations across pages).
- **`lime-form-validation.js`** — `initializeValidation()`, shared form validation logic (password rules, email format, required fields).
- **`lime-profile-completeness.js`** — `renderCompletionWidget()`, the profile-completion progress widget shown on the dashboard and profile page.

Auth pages (`LIMELOGIN.html`, `LIMESIGNUP.html`) intentionally skip `lime-nav.css`/`lime-nav.js` but still use `lime-background.css`.

## Data & persistence

There's no backend. Application state (saved jobs, submitted applications, settings) is persisted to the browser's `localStorage` and seeded with sample data on first load. Clearing site data / local storage resets the app to its demo state.

## Design conventions

- **Icons**: inline SVG only, Feather-style (`viewBox="0 0 24 24"`, `stroke="currentColor"`, `stroke-width="2"`, `fill="none"`). No emoji, no external icon font — keep new icons consistent with this set rather than introducing a library.
- **Corners**: 2–6px border-radius across the whole UI (sharp/industrial, not rounded/pill-shaped). Avoid reintroducing large radii or `50%`/`999px` pill shapes.
- **Color system**: dark charcoal/navy backgrounds with a lime-green (`#00ff41`) accent, used sparingly for interactive states, focus rings, and highlights.
- **Adding a new page**: link `lime-nav.css` and `lime-background.css` in `<head>`, add `<div id="lime-nav-root"></div>` and `<div class="lime-bg-image"></div>` / `<div class="lime-bg-overlay"></div>` right after `<body>`, then `lime-nav.js` before your other scripts. Add the page to `MAIN_LINKS` or `USER_LINKS` in `lime-nav.js` if it should appear in the nav.

## Known gaps / next steps

- Shadow depth and border-weight haven't had a dedicated pass yet (corners and backgrounds are done; shadows are still using their original values).
- `download (5).jpg` and `bg-video.mp4` are unused leftover assets from earlier design iterations — safe to delete if you don't need them for reference.
- No automated tests; this is a static prototype intended for visual/UX iteration.
