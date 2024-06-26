<style type="text/css" data-vite-dev-id="C:/xampp/htdocs/control-clase/resources/css/app.css">
    /*
    ! tailwindcss v3.3.3 | MIT License | https://tailwindcss.com
    */
    /*
    1. Prevent padding and border from affecting element width. (https://github.com/mozdevs/cssremedy/issues/4)
    2. Allow adding a border to an element by just adding a border-width. (https://github.com/tailwindcss/tailwindcss/pull/116)
    */

    *,
    ::before,
    ::after {
        box-sizing: border-box;
        /* 1 */
        border-width: 0;
        /* 2 */
        border-style: solid;
        /* 2 */
        border-color: #e5e7eb;
        /* 2 */
    }

    ::before,
    ::after {
        --tw-content: '';
    }

    /*
    1. Use a consistent sensible line-height in all browsers.
    2. Prevent adjustments of font size after orientation changes in iOS.
    3. Use a more readable tab size.
    4. Use the user's configured `sans` font-family by default.
    5. Use the user's configured `sans` font-feature-settings by default.
    6. Use the user's configured `sans` font-variation-settings by default.
    */

    html {
        line-height: 1.5;
        /* 1 */
        -webkit-text-size-adjust: 100%;
        /* 2 */
        -moz-tab-size: 4;
        /* 3 */
        -o-tab-size: 4;
        tab-size: 4;
        /* 3 */
        font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        /* 4 */
        font-feature-settings: normal;
        /* 5 */
        font-variation-settings: normal;
        /* 6 */
    }

    /*
    1. Remove the margin in all browsers.
    2. Inherit line-height from `html` so users can set them as a class directly on the `html` element.
    */

    body {
        margin: 0;
        /* 1 */
        line-height: inherit;
        /* 2 */
    }

    /*
    1. Add the correct height in Firefox.
    2. Correct the inheritance of border color in Firefox. (https://bugzilla.mozilla.org/show_bug.cgi?id=190655)
    3. Ensure horizontal rules are visible by default.
    */

    hr {
        height: 0;
        /* 1 */
        color: inherit;
        /* 2 */
        border-top-width: 1px;
        /* 3 */
    }

    /*
    Add the correct text decoration in Chrome, Edge, and Safari.
    */

    abbr:where([title]) {
        -webkit-text-decoration: underline dotted;
        text-decoration: underline dotted;
    }

    /*
    Remove the default font size and weight for headings.
    */

    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        font-size: inherit;
        font-weight: inherit;
    }

    /*
    Reset links to optimize for opt-in styling instead of opt-out.
    */

    a {
        color: inherit;
        text-decoration: inherit;
    }

    /*
    Add the correct font weight in Edge and Safari.
    */

    b,
    strong {
        font-weight: bolder;
    }

    /*
    1. Use the user's configured `mono` font family by default.
    2. Correct the odd `em` font sizing in all browsers.
    */

    code,
    kbd,
    samp,
    pre {
        font-family: ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;
        /* 1 */
        font-size: 1em;
        /* 2 */
    }

    /*
    Add the correct font size in all browsers.
    */

    small {
        font-size: 80%;
    }

    /*
    Prevent `sub` and `sup` elements from affecting the line height in all browsers.
    */

    sub,
    sup {
        font-size: 75%;
        line-height: 0;
        position: relative;
        vertical-align: baseline;
    }

    sub {
        bottom: -0.25em;
    }

    sup {
        top: -0.5em;
    }

    /*
    1. Remove text indentation from table contents in Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=999088, https://bugs.webkit.org/show_bug.cgi?id=201297)
    2. Correct table border color inheritance in all Chrome and Safari. (https://bugs.chromium.org/p/chromium/issues/detail?id=935729, https://bugs.webkit.org/show_bug.cgi?id=195016)
    3. Remove gaps between table borders by default.
    */

    table {
        text-indent: 0;
        /* 1 */
        border-color: inherit;
        /* 2 */
        border-collapse: collapse;
        /* 3 */
    }

    /*
    1. Change the font styles in all browsers.
    2. Remove the margin in Firefox and Safari.
    3. Remove default padding in all browsers.
    */

    button,
    input,
    optgroup,
    select,
    textarea {
        font-family: inherit;
        /* 1 */
        font-feature-settings: inherit;
        /* 1 */
        font-variation-settings: inherit;
        /* 1 */
        font-size: 100%;
        /* 1 */
        font-weight: inherit;
        /* 1 */
        line-height: inherit;
        /* 1 */
        color: inherit;
        /* 1 */
        margin: 0;
        /* 2 */
        padding: 0;
        /* 3 */
    }

    /*
    Remove the inheritance of text transform in Edge and Firefox.
    */

    button,
    select {
        text-transform: none;
    }

    /*
    1. Correct the inability to style clickable types in iOS and Safari.
    2. Remove default button styles.
    */

    button,
    [type='button'],
    [type='reset'],
    [type='submit'] {
        -webkit-appearance: button;
        /* 1 */
        background-color: transparent;
        /* 2 */
        background-image: none;
        /* 2 */
    }

    /*
    Use the modern Firefox focus style for all focusable elements.
    */

    :-moz-focusring {
        outline: auto;
    }

    /*
    Remove the additional `:invalid` styles in Firefox. (https://github.com/mozilla/gecko-dev/blob/2f9eacd9d3d995c937b4251a5557d95d494c9be1/layout/style/res/forms.css#L728-L737)
    */

    :-moz-ui-invalid {
        box-shadow: none;
    }

    /*
    Add the correct vertical alignment in Chrome and Firefox.
    */

    progress {
        vertical-align: baseline;
    }

    /*
    Correct the cursor style of increment and decrement buttons in Safari.
    */

    ::-webkit-inner-spin-button,
    ::-webkit-outer-spin-button {
        height: auto;
    }

    /*
    1. Correct the odd appearance in Chrome and Safari.
    2. Correct the outline style in Safari.
    */

    [type='search'] {
        -webkit-appearance: textfield;
        /* 1 */
        outline-offset: -2px;
        /* 2 */
    }

    /*
    Remove the inner padding in Chrome and Safari on macOS.
    */

    ::-webkit-search-decoration {
        -webkit-appearance: none;
    }

    /*
    1. Correct the inability to style clickable types in iOS and Safari.
    2. Change font properties to `inherit` in Safari.
    */

    ::-webkit-file-upload-button {
        -webkit-appearance: button;
        /* 1 */
        font: inherit;
        /* 2 */
    }

    /*
    Add the correct display in Chrome and Safari.
    */

    summary {
        display: list-item;
    }

    /*
    Removes the default spacing and border for appropriate elements.
    */

    blockquote,
    dl,
    dd,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    hr,
    figure,
    p,
    pre {
        margin: 0;
    }

    fieldset {
        margin: 0;
        padding: 0;
    }

    legend {
        padding: 0;
    }

    ol,
    ul,
    menu {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    /*
    Reset default styling for dialogs.
    */
    dialog {
        padding: 0;
    }

    /*
    Prevent resizing textareas horizontally by default.
    */

    textarea {
        resize: vertical;
    }

    /*
    1. Reset the default placeholder opacity in Firefox. (https://github.com/tailwindlabs/tailwindcss/issues/3300)
    2. Set the default placeholder color to the user's configured gray 400 color.
    */

    input::-moz-placeholder,
    textarea::-moz-placeholder {
        opacity: 1;
        /* 1 */
        color: #9ca3af;
        /* 2 */
    }

    input::placeholder,
    textarea::placeholder {
        opacity: 1;
        /* 1 */
        color: #9ca3af;
        /* 2 */
    }

    /*
    Set the default cursor for buttons.
    */

    button,
    [role="button"] {
        cursor: pointer;
    }

    /*
    Make sure disabled buttons don't get the pointer cursor.
    */
    :disabled {
        cursor: default;
    }

    /*
    1. Make replaced elements `display: block` by default. (https://github.com/mozdevs/cssremedy/issues/14)
    2. Add `vertical-align: middle` to align replaced elements more sensibly by default. (https://github.com/jensimmons/cssremedy/issues/14#issuecomment-634934210)
       This can trigger a poorly considered lint error in some tools but is included by design.
    */

    img,
    svg,
    video,
    canvas,
    audio,
    iframe,
    embed,
    object {
        display: block;
        /* 1 */
        vertical-align: middle;
        /* 2 */
    }

    /*
    Constrain images and videos to the parent width and preserve their intrinsic aspect ratio. (https://github.com/mozdevs/cssremedy/issues/14)
    */

    img,
    video {
        max-width: 100%;
        height: auto;
    }

    /* Make elements with the HTML hidden attribute stay hidden by default */
    [hidden] {
        display: none;
    }

    [type='text'],
    input:where(:not([type])),
    [type='email'],
    [type='url'],
    [type='password'],
    [type='number'],
    [type='date'],
    [type='datetime-local'],
    [type='month'],
    [type='search'],
    [type='tel'],
    [type='time'],
    [type='week'],
    [multiple],
    textarea,
    select {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-color: #fff;
        border-color: #6b7280;
        border-width: 1px;
        border-radius: 0px;
        padding-top: 0.5rem;
        padding-right: 0.75rem;
        padding-bottom: 0.5rem;
        padding-left: 0.75rem;
        font-size: 1rem;
        line-height: 1.5rem;
        --tw-shadow: 0 0 #0000;
    }

    [type='text']:focus,
    input:where(:not([type])):focus,
    [type='email']:focus,
    [type='url']:focus,
    [type='password']:focus,
    [type='number']:focus,
    [type='date']:focus,
    [type='datetime-local']:focus,
    [type='month']:focus,
    [type='search']:focus,
    [type='tel']:focus,
    [type='time']:focus,
    [type='week']:focus,
    [multiple]:focus,
    textarea:focus,
    select:focus {
        outline: 2px solid transparent;
        outline-offset: 2px;
        --tw-ring-inset: var(--tw-empty,
                /*!*/
                /*!*/
            );
        --tw-ring-offset-width: 0px;
        --tw-ring-offset-color: #fff;
        --tw-ring-color: #2563eb;
        --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
        --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
        box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
        border-color: #2563eb;
    }

    input::-moz-placeholder,
    textarea::-moz-placeholder {
        color: #6b7280;
        opacity: 1;
    }

    input::placeholder,
    textarea::placeholder {
        color: #6b7280;
        opacity: 1;
    }

    ::-webkit-datetime-edit-fields-wrapper {
        padding: 0;
    }

    ::-webkit-date-and-time-value {
        min-height: 1.5em;
        text-align: inherit;
    }

    ::-webkit-datetime-edit {
        display: inline-flex;
    }

    ::-webkit-datetime-edit,
    ::-webkit-datetime-edit-year-field,
    ::-webkit-datetime-edit-month-field,
    ::-webkit-datetime-edit-day-field,
    ::-webkit-datetime-edit-hour-field,
    ::-webkit-datetime-edit-minute-field,
    ::-webkit-datetime-edit-second-field,
    ::-webkit-datetime-edit-millisecond-field,
    ::-webkit-datetime-edit-meridiem-field {
        padding-top: 0;
        padding-bottom: 0;
    }

    select {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");
        background-position: right 0.5rem center;
        background-repeat: no-repeat;
        background-size: 1.5em 1.5em;
        padding-right: 2.5rem;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
    }

    [multiple],
    [size]:where(select:not([size="1"])) {
        background-image: initial;
        background-position: initial;
        background-repeat: unset;
        background-size: initial;
        padding-right: 0.75rem;
        -webkit-print-color-adjust: unset;
        print-color-adjust: unset;
    }

    [type='checkbox'],
    [type='radio'] {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        padding: 0;
        -webkit-print-color-adjust: exact;
        print-color-adjust: exact;
        display: inline-block;
        vertical-align: middle;
        background-origin: border-box;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
        flex-shrink: 0;
        height: 1rem;
        width: 1rem;
        color: #2563eb;
        background-color: #fff;
        border-color: #6b7280;
        border-width: 1px;
        --tw-shadow: 0 0 #0000;
    }

    [type='checkbox'] {
        border-radius: 0px;
    }

    [type='radio'] {
        border-radius: 100%;
    }

    [type='checkbox']:focus,
    [type='radio']:focus {
        outline: 2px solid transparent;
        outline-offset: 2px;
        --tw-ring-inset: var(--tw-empty,
                /*!*/
                /*!*/
            );
        --tw-ring-offset-width: 2px;
        --tw-ring-offset-color: #fff;
        --tw-ring-color: #2563eb;
        --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
        --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
        box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);
    }

    [type='checkbox']:checked,
    [type='radio']:checked {
        border-color: transparent;
        background-color: currentColor;
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
    }

    [type='checkbox']:checked {
        background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M12.207 4.793a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0 011.414-1.414L6.5 9.086l4.293-4.293a1 1 0 011.414 0z'/%3e%3c/svg%3e");
    }

    [type='radio']:checked {
        background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
    }

    [type='checkbox']:checked:hover,
    [type='checkbox']:checked:focus,
    [type='radio']:checked:hover,
    [type='radio']:checked:focus {
        border-color: transparent;
        background-color: currentColor;
    }

    [type='checkbox']:indeterminate {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 16 16'%3e%3cpath stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M4 8h8'/%3e%3c/svg%3e");
        border-color: transparent;
        background-color: currentColor;
        background-size: 100% 100%;
        background-position: center;
        background-repeat: no-repeat;
    }

    [type='checkbox']:indeterminate:hover,
    [type='checkbox']:indeterminate:focus {
        border-color: transparent;
        background-color: currentColor;
    }

    [type='file'] {
        background: unset;
        border-color: inherit;
        border-width: 0;
        border-radius: 0;
        padding: 0;
        font-size: unset;
        line-height: inherit;
    }

    [type='file']:focus {
        outline: 1px solid ButtonText;
        outline: 1px auto -webkit-focus-ring-color;
    }

    *,
    ::before,
    ::after {
        --tw-border-spacing-x: 0;
        --tw-border-spacing-y: 0;
        --tw-translate-x: 0;
        --tw-translate-y: 0;
        --tw-rotate: 0;
        --tw-skew-x: 0;
        --tw-skew-y: 0;
        --tw-scale-x: 1;
        --tw-scale-y: 1;
        --tw-pan-x: ;
        --tw-pan-y: ;
        --tw-pinch-zoom: ;
        --tw-scroll-snap-strictness: proximity;
        --tw-gradient-from-position: ;
        --tw-gradient-via-position: ;
        --tw-gradient-to-position: ;
        --tw-ordinal: ;
        --tw-slashed-zero: ;
        --tw-numeric-figure: ;
        --tw-numeric-spacing: ;
        --tw-numeric-fraction: ;
        --tw-ring-inset: ;
        --tw-ring-offset-width: 0px;
        --tw-ring-offset-color: #fff;
        --tw-ring-color: rgb(59 130 246 / 0.5);
        --tw-ring-offset-shadow: 0 0 #0000;
        --tw-ring-shadow: 0 0 #0000;
        --tw-shadow: 0 0 #0000;
        --tw-shadow-colored: 0 0 #0000;
        --tw-blur: ;
        --tw-brightness: ;
        --tw-contrast: ;
        --tw-grayscale: ;
        --tw-hue-rotate: ;
        --tw-invert: ;
        --tw-saturate: ;
        --tw-sepia: ;
        --tw-drop-shadow: ;
        --tw-backdrop-blur: ;
        --tw-backdrop-brightness: ;
        --tw-backdrop-contrast: ;
        --tw-backdrop-grayscale: ;
        --tw-backdrop-hue-rotate: ;
        --tw-backdrop-invert: ;
        --tw-backdrop-opacity: ;
        --tw-backdrop-saturate: ;
        --tw-backdrop-sepia: ;
    }

    ::backdrop {
        --tw-border-spacing-x: 0;
        --tw-border-spacing-y: 0;
        --tw-translate-x: 0;
        --tw-translate-y: 0;
        --tw-rotate: 0;
        --tw-skew-x: 0;
        --tw-skew-y: 0;
        --tw-scale-x: 1;
        --tw-scale-y: 1;
        --tw-pan-x: ;
        --tw-pan-y: ;
        --tw-pinch-zoom: ;
        --tw-scroll-snap-strictness: proximity;
        --tw-gradient-from-position: ;
        --tw-gradient-via-position: ;
        --tw-gradient-to-position: ;
        --tw-ordinal: ;
        --tw-slashed-zero: ;
        --tw-numeric-figure: ;
        --tw-numeric-spacing: ;
        --tw-numeric-fraction: ;
        --tw-ring-inset: ;
        --tw-ring-offset-width: 0px;
        --tw-ring-offset-color: #fff;
        --tw-ring-color: rgb(59 130 246 / 0.5);
        --tw-ring-offset-shadow: 0 0 #0000;
        --tw-ring-shadow: 0 0 #0000;
        --tw-shadow: 0 0 #0000;
        --tw-shadow-colored: 0 0 #0000;
        --tw-blur: ;
        --tw-brightness: ;
        --tw-contrast: ;
        --tw-grayscale: ;
        --tw-hue-rotate: ;
        --tw-invert: ;
        --tw-saturate: ;
        --tw-sepia: ;
        --tw-drop-shadow: ;
        --tw-backdrop-blur: ;
        --tw-backdrop-brightness: ;
        --tw-backdrop-contrast: ;
        --tw-backdrop-grayscale: ;
        --tw-backdrop-hue-rotate: ;
        --tw-backdrop-invert: ;
        --tw-backdrop-opacity: ;
        --tw-backdrop-saturate: ;
        --tw-backdrop-sepia: ;
    }

    .container {
        width: 100%;
    }

    @media (min-width: 640px) {

        .container {
            max-width: 640px;
        }
    }

    @media (min-width: 768px) {

        .container {
            max-width: 768px;
        }
    }

    @media (min-width: 1024px) {

        .container {
            max-width: 1024px;
        }
    }

    @media (min-width: 1280px) {

        .container {
            max-width: 1280px;
        }
    }

    @media (min-width: 1536px) {

        .container {
            max-width: 1536px;
        }
    }

    .sr-only {
        position: absolute;
        width: 1px;
        height: 1px;
        padding: 0;
        margin: -1px;
        overflow: hidden;
        clip: rect(0, 0, 0, 0);
        white-space: nowrap;
        border-width: 0;
    }

    .pointer-events-none {
        pointer-events: none;
    }

    .pointer-events-auto {
        pointer-events: auto;
    }

    .visible {
        visibility: visible;
    }

    .invisible {
        visibility: hidden;
    }

    .fixed {
        position: fixed;
    }

    .absolute {
        position: absolute;
    }

    .relative {
        position: relative;
    }

    .inset-0 {
        inset: 0px;
    }

    .inset-y-0 {
        top: 0px;
        bottom: 0px;
    }

    .-right-1\/2 {
        right: -50%;
    }

    .-top-1\/2 {
        top: -50%;
    }

    .bottom-0 {
        bottom: 0px;
    }

    .bottom-auto {
        bottom: auto;
    }

    .left-0 {
        left: 0px;
    }

    .right-0 {
        right: 0px;
    }

    .top-0 {
        top: 0px;
    }

    .-z-10 {
        z-index: -10;
    }

    .-z-\[1\] {
        z-index: -1;
    }

    .z-0 {
        z-index: 0;
    }

    .z-10 {
        z-index: 10;
    }

    .z-20 {
        z-index: 20;
    }

    .z-30 {
        z-index: 30;
    }

    .z-40 {
        z-index: 40;
    }

    .order-1 {
        order: 1;
    }

    .order-2 {
        order: 2;
    }

    .order-3 {
        order: 3;
    }

    .order-4 {
        order: 4;
    }

    .order-5 {
        order: 5;
    }

    .order-6 {
        order: 6;
    }

    .col-span-full {
        grid-column: 1 / -1;
    }

    .-mx-1 {
        margin-left: -0.25rem;
        margin-right: -0.25rem;
    }

    .-mx-1\.5 {
        margin-left: -0.375rem;
        margin-right: -0.375rem;
    }

    .-my-1 {
        margin-top: -0.25rem;
        margin-bottom: -0.25rem;
    }

    .-my-1\.5 {
        margin-top: -0.375rem;
        margin-bottom: -0.375rem;
    }

    .-my-2 {
        margin-top: -0.5rem;
        margin-bottom: -0.5rem;
    }

    .mx-auto {
        margin-left: auto;
        margin-right: auto;
    }

    .my-3 {
        margin-top: 0.75rem;
        margin-bottom: 0.75rem;
    }

    .my-4 {
        margin-top: 1rem;
        margin-bottom: 1rem;
    }

    .my-5 {
        margin-top: 1.25rem;
        margin-bottom: 1.25rem;
    }

    .-ml-px {
        margin-left: -1px;
    }

    .-mr-2 {
        margin-right: -0.5rem;
    }

    .-mt-px {
        margin-top: -1px;
    }

    .mb-1 {
        margin-bottom: 0.25rem;
    }

    .mb-3 {
        margin-bottom: 0.75rem;
    }

    .mb-4 {
        margin-bottom: 1rem;
    }

    .mb-5 {
        margin-bottom: 1.25rem;
    }

    .mb-7 {
        margin-bottom: 1.75rem;
    }

    .ml-1 {
        margin-left: 0.25rem;
    }

    .ml-12 {
        margin-left: 3rem;
    }

    .ml-2 {
        margin-left: 0.5rem;
    }

    .ml-3 {
        margin-left: 0.75rem;
    }

    .ml-4 {
        margin-left: 1rem;
    }

    .ml-auto {
        margin-left: auto;
    }

    .mr-2 {
        margin-right: 0.5rem;
    }

    .mr-3 {
        margin-right: 0.75rem;
    }

    .mt-1 {
        margin-top: 0.25rem;
    }

    .mt-10 {
        margin-top: 2.5rem;
    }

    .mt-2 {
        margin-top: 0.5rem;
    }

    .mt-3 {
        margin-top: 0.75rem;
    }

    .mt-4 {
        margin-top: 1rem;
    }

    .mt-5 {
        margin-top: 1.25rem;
    }

    .mt-6 {
        margin-top: 1.5rem;
    }

    .mt-8 {
        margin-top: 2rem;
    }

    .block {
        display: block;
    }

    .inline-block {
        display: inline-block;
    }

    .inline {
        display: inline;
    }

    .flex {
        display: flex;
    }

    .inline-flex {
        display: inline-flex;
    }

    .\!table {
        display: table !important;
    }

    .table {
        display: table;
    }

    .grid {
        display: grid;
    }

    .hidden {
        display: none;
    }

    .h-10 {
        height: 2.5rem;
    }

    .h-16 {
        height: 4rem;
    }

    .h-20 {
        height: 5rem;
    }

    .h-3 {
        height: 0.75rem;
    }

    .h-4 {
        height: 1rem;
    }

    .h-5 {
        height: 1.25rem;
    }

    .h-6 {
        height: 1.5rem;
    }

    .h-8 {
        height: 2rem;
    }

    .h-9 {
        height: 2.25rem;
    }

    .h-\[200px\] {
        height: 200px;
    }

    .h-\[300px\] {
        height: 300px;
    }

    .h-\[400px\] {
        height: 400px;
    }

    .h-\[72px\] {
        height: 72px;
    }

    .h-auto {
        height: auto;
    }

    .h-full {
        height: 100%;
    }

    .min-h-\[200px\] {
        min-height: 200px;
    }

    .min-h-\[250px\] {
        min-height: 250px;
    }

    .min-h-\[300px\] {
        min-height: 300px;
    }

    .min-h-full {
        min-height: 100%;
    }

    .min-h-screen {
        min-height: 100vh;
    }

    .w-10 {
        width: 2.5rem;
    }

    .w-11 {
        width: 2.75rem;
    }

    .w-20 {
        width: 5rem;
    }

    .w-3 {
        width: 0.75rem;
    }

    .w-4 {
        width: 1rem;
    }

    .w-48 {
        width: 12rem;
    }

    .w-5 {
        width: 1.25rem;
    }

    .w-6 {
        width: 1.5rem;
    }

    .w-8 {
        width: 2rem;
    }

    .w-\[72px\] {
        width: 72px;
    }

    .w-\[90px\] {
        width: 90px;
    }

    .w-auto {
        width: auto;
    }

    .w-full {
        width: 100%;
    }

    .min-w-0 {
        min-width: 0px;
    }

    .min-w-\[100px\] {
        min-width: 100px;
    }

    .min-w-\[240px\] {
        min-width: 240px;
    }

    .min-w-\[250px\] {
        min-width: 250px;
    }

    .min-w-full {
        min-width: 100%;
    }

    .min-w-max {
        min-width: -moz-max-content;
        min-width: max-content;
    }

    .max-w-2xl {
        max-width: 42rem;
    }

    .max-w-3xl {
        max-width: 48rem;
    }

    .max-w-4xl {
        max-width: 56rem;
    }

    .max-w-5xl {
        max-width: 64rem;
    }

    .max-w-6xl {
        max-width: 72rem;
    }

    .max-w-7xl {
        max-width: 80rem;
    }

    .max-w-\[300px\] {
        max-width: 300px;
    }

    .max-w-lg {
        max-width: 32rem;
    }

    .max-w-md {
        max-width: 28rem;
    }

    .max-w-prose {
        max-width: 65ch;
    }

    .max-w-screen-md {
        max-width: 768px;
    }

    .max-w-screen-xl {
        max-width: 1280px;
    }

    .max-w-sm {
        max-width: 24rem;
    }

    .max-w-xl {
        max-width: 36rem;
    }

    .flex-1 {
        flex: 1 1 0%;
    }

    .flex-shrink-0 {
        flex-shrink: 0;
    }

    .shrink-0 {
        flex-shrink: 0;
    }

    .flex-grow {
        flex-grow: 1;
    }

    .-translate-x-full {
        --tw-translate-x: -100%;
        transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
    }

    .translate-x-0 {
        --tw-translate-x: 0px;
        transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
    }

    .translate-x-5 {
        --tw-translate-x: 1.25rem;
        transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
    }

    .translate-x-full {
        --tw-translate-x: 100%;
        transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
    }

    .translate-y-0 {
        --tw-translate-y: 0px;
        transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
    }

    .translate-y-4 {
        --tw-translate-y: 1rem;
        transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
    }

    .scale-100 {
        --tw-scale-x: 1;
        --tw-scale-y: 1;
        transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
    }

    .scale-95 {
        --tw-scale-x: .95;
        --tw-scale-y: .95;
        transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
    }

    .transform {
        transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
    }

    @keyframes spin {

        to {
            transform: rotate(360deg);
        }
    }

    .animate-spin {
        animation: spin 1s linear infinite;
    }

    .cursor-default {
        cursor: default;
    }

    .cursor-not-allowed {
        cursor: not-allowed;
    }

    .cursor-pointer {
        cursor: pointer;
    }

    .select-none {
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    .grid-cols-1 {
        grid-template-columns: repeat(1, minmax(0, 1fr));
    }

    .grid-cols-3 {
        grid-template-columns: repeat(3, minmax(0, 1fr));
    }

    .flex-row {
        flex-direction: row;
    }

    .flex-col {
        flex-direction: column;
    }

    .flex-wrap {
        flex-wrap: wrap;
    }

    .items-start {
        align-items: flex-start;
    }

    .items-end {
        align-items: flex-end;
    }

    .items-center {
        align-items: center;
    }

    .justify-start {
        justify-content: flex-start;
    }

    .justify-end {
        justify-content: flex-end;
    }

    .justify-center {
        justify-content: center;
    }

    .justify-between {
        justify-content: space-between;
    }

    .justify-evenly {
        justify-content: space-evenly;
    }

    .justify-items-center {
        justify-items: center;
    }

    .gap-1 {
        gap: 0.25rem;
    }

    .gap-10 {
        gap: 2.5rem;
    }

    .gap-2 {
        gap: 0.5rem;
    }

    .gap-3 {
        gap: 0.75rem;
    }

    .gap-4 {
        gap: 1rem;
    }

    .gap-5 {
        gap: 1.25rem;
    }

    .gap-x-2 {
        -moz-column-gap: 0.5rem;
        column-gap: 0.5rem;
    }

    .gap-x-3 {
        -moz-column-gap: 0.75rem;
        column-gap: 0.75rem;
    }

    .gap-x-5 {
        -moz-column-gap: 1.25rem;
        column-gap: 1.25rem;
    }

    .gap-y-2 {
        row-gap: 0.5rem;
    }

    .gap-y-3 {
        row-gap: 0.75rem;
    }

    .gap-y-4 {
        row-gap: 1rem;
    }

    .gap-y-5 {
        row-gap: 1.25rem;
    }

    .gap-y-7 {
        row-gap: 1.75rem;
    }

    .space-x-3> :not([hidden])~ :not([hidden]) {
        --tw-space-x-reverse: 0;
        margin-right: calc(0.75rem * var(--tw-space-x-reverse));
        margin-left: calc(0.75rem * calc(1 - var(--tw-space-x-reverse)));
    }

    .space-x-5> :not([hidden])~ :not([hidden]) {
        --tw-space-x-reverse: 0;
        margin-right: calc(1.25rem * var(--tw-space-x-reverse));
        margin-left: calc(1.25rem * calc(1 - var(--tw-space-x-reverse)));
    }

    .space-x-6> :not([hidden])~ :not([hidden]) {
        --tw-space-x-reverse: 0;
        margin-right: calc(1.5rem * var(--tw-space-x-reverse));
        margin-left: calc(1.5rem * calc(1 - var(--tw-space-x-reverse)));
    }

    .space-x-8> :not([hidden])~ :not([hidden]) {
        --tw-space-x-reverse: 0;
        margin-right: calc(2rem * var(--tw-space-x-reverse));
        margin-left: calc(2rem * calc(1 - var(--tw-space-x-reverse)));
    }

    .space-y-1> :not([hidden])~ :not([hidden]) {
        --tw-space-y-reverse: 0;
        margin-top: calc(0.25rem * calc(1 - var(--tw-space-y-reverse)));
        margin-bottom: calc(0.25rem * var(--tw-space-y-reverse));
    }

    .space-y-10> :not([hidden])~ :not([hidden]) {
        --tw-space-y-reverse: 0;
        margin-top: calc(2.5rem * calc(1 - var(--tw-space-y-reverse)));
        margin-bottom: calc(2.5rem * var(--tw-space-y-reverse));
    }

    .space-y-2> :not([hidden])~ :not([hidden]) {
        --tw-space-y-reverse: 0;
        margin-top: calc(0.5rem * calc(1 - var(--tw-space-y-reverse)));
        margin-bottom: calc(0.5rem * var(--tw-space-y-reverse));
    }

    .space-y-3> :not([hidden])~ :not([hidden]) {
        --tw-space-y-reverse: 0;
        margin-top: calc(0.75rem * calc(1 - var(--tw-space-y-reverse)));
        margin-bottom: calc(0.75rem * var(--tw-space-y-reverse));
    }

    .space-y-4> :not([hidden])~ :not([hidden]) {
        --tw-space-y-reverse: 0;
        margin-top: calc(1rem * calc(1 - var(--tw-space-y-reverse)));
        margin-bottom: calc(1rem * var(--tw-space-y-reverse));
    }

    .space-y-6> :not([hidden])~ :not([hidden]) {
        --tw-space-y-reverse: 0;
        margin-top: calc(1.5rem * calc(1 - var(--tw-space-y-reverse)));
        margin-bottom: calc(1.5rem * var(--tw-space-y-reverse));
    }

    .space-y-7> :not([hidden])~ :not([hidden]) {
        --tw-space-y-reverse: 0;
        margin-top: calc(1.75rem * calc(1 - var(--tw-space-y-reverse)));
        margin-bottom: calc(1.75rem * var(--tw-space-y-reverse));
    }

    .divide-y> :not([hidden])~ :not([hidden]) {
        --tw-divide-y-reverse: 0;
        border-top-width: calc(1px * calc(1 - var(--tw-divide-y-reverse)));
        border-bottom-width: calc(1px * var(--tw-divide-y-reverse));
    }

    .divide-gray-200> :not([hidden])~ :not([hidden]) {
        --tw-divide-opacity: 1;
        border-color: rgb(229 231 235 / var(--tw-divide-opacity));
    }

    .overflow-hidden {
        overflow: hidden;
    }

    .overflow-x-auto {
        overflow-x: auto;
    }

    .overflow-y-auto {
        overflow-y: auto;
    }

    .overflow-x-hidden {
        overflow-x: hidden;
    }

    .whitespace-nowrap {
        white-space: nowrap;
    }

    .break-words {
        overflow-wrap: break-word;
    }

    .rounded {
        border-radius: 0.25rem;
    }

    .rounded-full {
        border-radius: 9999px;
    }

    .rounded-lg {
        border-radius: 0.5rem;
    }

    .rounded-md {
        border-radius: 0.375rem;
    }

    .rounded-none {
        border-radius: 0px;
    }

    .rounded-l-md {
        border-top-left-radius: 0.375rem;
        border-bottom-left-radius: 0.375rem;
    }

    .rounded-r-md {
        border-top-right-radius: 0.375rem;
        border-bottom-right-radius: 0.375rem;
    }

    .border {
        border-width: 1px;
    }

    .border-0 {
        border-width: 0px;
    }

    .border-2 {
        border-width: 2px;
    }

    .border-b {
        border-bottom-width: 1px;
    }

    .border-b-0 {
        border-bottom-width: 0px;
    }

    .border-b-2 {
        border-bottom-width: 2px;
    }

    .border-l {
        border-left-width: 1px;
    }

    .border-l-0 {
        border-left-width: 0px;
    }

    .border-l-4 {
        border-left-width: 4px;
    }

    .border-r {
        border-right-width: 1px;
    }

    .border-r-0 {
        border-right-width: 0px;
    }

    .border-t {
        border-top-width: 1px;
    }

    .border-t-0 {
        border-top-width: 0px;
    }

    .border-blue-400 {
        --tw-border-opacity: 1;
        border-color: rgb(96 165 250 / var(--tw-border-opacity));
    }

    .border-cyan-500 {
        --tw-border-opacity: 1;
        border-color: rgb(6 182 212 / var(--tw-border-opacity));
    }

    .border-gray-100 {
        --tw-border-opacity: 1;
        border-color: rgb(243 244 246 / var(--tw-border-opacity));
    }

    .border-gray-200 {
        --tw-border-opacity: 1;
        border-color: rgb(229 231 235 / var(--tw-border-opacity));
    }

    .border-gray-300 {
        --tw-border-opacity: 1;
        border-color: rgb(209 213 219 / var(--tw-border-opacity));
    }

    .border-gray-400 {
        --tw-border-opacity: 1;
        border-color: rgb(156 163 175 / var(--tw-border-opacity));
    }

    .border-green-400 {
        --tw-border-opacity: 1;
        border-color: rgb(74 222 128 / var(--tw-border-opacity));
    }

    .border-indigo-500 {
        --tw-border-opacity: 1;
        border-color: rgb(99 102 241 / var(--tw-border-opacity));
    }

    .border-primary-500 {
        border-color: #e2702e9f;
    }

    .border-red-400 {
        --tw-border-opacity: 1;
        border-color: rgb(248 113 113 / var(--tw-border-opacity));
    }

    .border-transparent {
        border-color: transparent;
    }

    .border-yellow-400 {
        --tw-border-opacity: 1;
        border-color: rgb(250 204 21 / var(--tw-border-opacity));
    }

    .bg-black\/75 {
        background-color: rgb(0 0 0 / 0.75);
    }

    .bg-blue-50 {
        --tw-bg-opacity: 1;
        background-color: rgb(239 246 255 / var(--tw-bg-opacity));
    }

    .bg-cyan-200 {
        --tw-bg-opacity: 1;
        background-color: rgb(165 243 252 / var(--tw-bg-opacity));
    }

    .bg-gray-100 {
        --tw-bg-opacity: 1;
        background-color: rgb(243 244 246 / var(--tw-bg-opacity));
    }

    .bg-gray-200 {
        --tw-bg-opacity: 1;
        background-color: rgb(229 231 235 / var(--tw-bg-opacity));
    }

    .bg-gray-50 {
        --tw-bg-opacity: 1;
        background-color: rgb(249 250 251 / var(--tw-bg-opacity));
    }

    .bg-green-50 {
        --tw-bg-opacity: 1;
        background-color: rgb(240 253 244 / var(--tw-bg-opacity));
    }

    .bg-green-500 {
        --tw-bg-opacity: 1;
        background-color: rgb(34 197 94 / var(--tw-bg-opacity));
    }

    .bg-indigo-50 {
        --tw-bg-opacity: 1;
        background-color: rgb(238 242 255 / var(--tw-bg-opacity));
    }

    .bg-indigo-500 {
        --tw-bg-opacity: 1;
        background-color: rgb(99 102 241 / var(--tw-bg-opacity));
    }

    .bg-orange-50 {
        --tw-bg-opacity: 1;
        background-color: rgb(255 247 237 / var(--tw-bg-opacity));
    }

    .bg-primary {
        --tw-bg-opacity: 1;
        background-color: rgb(226 112 46 / var(--tw-bg-opacity));
    }

    .bg-primary-500 {
        background-color: #e2702e9f;
    }

    .bg-primary-800 {
        background-color: #e2702ec2;
    }

    .bg-red-50 {
        --tw-bg-opacity: 1;
        background-color: rgb(254 242 242 / var(--tw-bg-opacity));
    }

    .bg-red-500 {
        --tw-bg-opacity: 1;
        background-color: rgb(239 68 68 / var(--tw-bg-opacity));
    }

    .bg-red-600 {
        --tw-bg-opacity: 1;
        background-color: rgb(220 38 38 / var(--tw-bg-opacity));
    }

    .bg-slate-800 {
        --tw-bg-opacity: 1;
        background-color: rgb(30 41 59 / var(--tw-bg-opacity));
    }

    .bg-white {
        --tw-bg-opacity: 1;
        background-color: rgb(255 255 255 / var(--tw-bg-opacity));
    }

    .bg-yellow-50 {
        --tw-bg-opacity: 1;
        background-color: rgb(254 252 232 / var(--tw-bg-opacity));
    }

    .bg-\[linear-gradient\(to_right\2c \#4f4f4f2e_1px\2c transparent_1px\)\2c linear-gradient\(to_bottom\2c \#4f4f4f2e_1px\2c transparent_1px\)\] {
        background-image: linear-gradient(to right, #4f4f4f2e 1px, transparent 1px), linear-gradient(to bottom, #4f4f4f2e 1px, transparent 1px);
    }

    .bg-\[linear-gradient\(to_right\2c \#f0f0f0_1px\2c transparent_1px\)\2c linear-gradient\(to_bottom\2c \#f0f0f0_1px\2c transparent_1px\)\] {
        background-image: linear-gradient(to right, #f0f0f0 1px, transparent 1px), linear-gradient(to bottom, #f0f0f0 1px, transparent 1px);
    }

    .bg-\[radial-gradient\(circle_800px_at_100\%_200px\2c \#e2702e\2c transparent\)\] {
        background-image: radial-gradient(circle 800px at 100% 200px, #e2702e, transparent);
    }

    .bg-\[size\:14px_24px\] {
        background-size: 14px 24px;
    }

    .bg-\[size\:6rem_4rem\] {
        background-size: 6rem 4rem;
    }

    .fill-current {
        fill: currentColor;
    }

    .fill-none {
        fill: none;
    }

    .stroke-primary {
        stroke: #e2702e;
    }

    .p-1 {
        padding: 0.25rem;
    }

    .p-1\.5 {
        padding: 0.375rem;
    }

    .p-2 {
        padding: 0.5rem;
    }

    .p-3 {
        padding: 0.75rem;
    }

    .p-4 {
        padding: 1rem;
    }

    .p-5 {
        padding: 1.25rem;
    }

    .p-6 {
        padding: 1.5rem;
    }

    .px-1 {
        padding-left: 0.25rem;
        padding-right: 0.25rem;
    }

    .px-10 {
        padding-left: 2.5rem;
        padding-right: 2.5rem;
    }

    .px-2 {
        padding-left: 0.5rem;
        padding-right: 0.5rem;
    }

    .px-2\.5 {
        padding-left: 0.625rem;
        padding-right: 0.625rem;
    }

    .px-3 {
        padding-left: 0.75rem;
        padding-right: 0.75rem;
    }

    .px-4 {
        padding-left: 1rem;
        padding-right: 1rem;
    }

    .px-5 {
        padding-left: 1.25rem;
        padding-right: 1.25rem;
    }

    .px-6 {
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }

    .py-1 {
        padding-top: 0.25rem;
        padding-bottom: 0.25rem;
    }

    .py-12 {
        padding-top: 3rem;
        padding-bottom: 3rem;
    }

    .py-2 {
        padding-top: 0.5rem;
        padding-bottom: 0.5rem;
    }

    .py-3 {
        padding-top: 0.75rem;
        padding-bottom: 0.75rem;
    }

    .py-4 {
        padding-top: 1rem;
        padding-bottom: 1rem;
    }

    .py-5 {
        padding-top: 1.25rem;
        padding-bottom: 1.25rem;
    }

    .pb-1 {
        padding-bottom: 0.25rem;
    }

    .pb-2 {
        padding-bottom: 0.5rem;
    }

    .pb-3 {
        padding-bottom: 0.75rem;
    }

    .pb-4 {
        padding-bottom: 1rem;
    }

    .pb-5 {
        padding-bottom: 1.25rem;
    }

    .pl-3 {
        padding-left: 0.75rem;
    }

    .pr-3 {
        padding-right: 0.75rem;
    }

    .pr-4 {
        padding-right: 1rem;
    }

    .pr-6 {
        padding-right: 1.5rem;
    }

    .pt-1 {
        padding-top: 0.25rem;
    }

    .pt-2 {
        padding-top: 0.5rem;
    }

    .pt-3 {
        padding-top: 0.75rem;
    }

    .pt-4 {
        padding-top: 1rem;
    }

    .pt-5 {
        padding-top: 1.25rem;
    }

    .pt-6 {
        padding-top: 1.5rem;
    }

    .pt-8 {
        padding-top: 2rem;
    }

    .text-left {
        text-align: left;
    }

    .text-center {
        text-align: center;
    }

    .align-middle {
        vertical-align: middle;
    }

    .font-sans {
        font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }

    .text-2xl {
        font-size: 1.5rem;
        line-height: 2rem;
    }

    .text-3xl {
        font-size: 1.875rem;
        line-height: 2.25rem;
    }

    .text-base {
        font-size: 1rem;
        line-height: 1.5rem;
    }

    .text-lg {
        font-size: 1.125rem;
        line-height: 1.75rem;
    }

    .text-sm {
        font-size: 0.875rem;
        line-height: 1.25rem;
    }

    .text-xl {
        font-size: 1.25rem;
        line-height: 1.75rem;
    }

    .text-xs {
        font-size: 0.75rem;
        line-height: 1rem;
    }

    .font-black {
        font-weight: 900;
    }

    .font-bold {
        font-weight: 700;
    }

    .font-medium {
        font-weight: 500;
    }

    .font-normal {
        font-weight: 400;
    }

    .font-semibold {
        font-weight: 600;
    }

    .uppercase {
        text-transform: uppercase;
    }

    .capitalize {
        text-transform: capitalize;
    }

    .italic {
        font-style: italic;
    }

    .leading-5 {
        line-height: 1.25rem;
    }

    .leading-6 {
        line-height: 1.5rem;
    }

    .leading-7 {
        line-height: 1.75rem;
    }

    .leading-tight {
        line-height: 1.25;
    }

    .tracking-wide {
        letter-spacing: 0.025em;
    }

    .tracking-wider {
        letter-spacing: 0.05em;
    }

    .text-blue-400 {
        --tw-text-opacity: 1;
        color: rgb(96 165 250 / var(--tw-text-opacity));
    }

    .text-blue-500 {
        --tw-text-opacity: 1;
        color: rgb(59 130 246 / var(--tw-text-opacity));
    }

    .text-blue-700 {
        --tw-text-opacity: 1;
        color: rgb(29 78 216 / var(--tw-text-opacity));
    }

    .text-blue-800 {
        --tw-text-opacity: 1;
        color: rgb(30 64 175 / var(--tw-text-opacity));
    }

    .text-gray-200 {
        --tw-text-opacity: 1;
        color: rgb(229 231 235 / var(--tw-text-opacity));
    }

    .text-gray-300 {
        --tw-text-opacity: 1;
        color: rgb(209 213 219 / var(--tw-text-opacity));
    }

    .text-gray-400 {
        --tw-text-opacity: 1;
        color: rgb(156 163 175 / var(--tw-text-opacity));
    }

    .text-gray-500 {
        --tw-text-opacity: 1;
        color: rgb(107 114 128 / var(--tw-text-opacity));
    }

    .text-gray-600 {
        --tw-text-opacity: 1;
        color: rgb(75 85 99 / var(--tw-text-opacity));
    }

    .text-gray-700 {
        --tw-text-opacity: 1;
        color: rgb(55 65 81 / var(--tw-text-opacity));
    }

    .text-gray-800 {
        --tw-text-opacity: 1;
        color: rgb(31 41 55 / var(--tw-text-opacity));
    }

    .text-gray-900 {
        --tw-text-opacity: 1;
        color: rgb(17 24 39 / var(--tw-text-opacity));
    }

    .text-green-400 {
        --tw-text-opacity: 1;
        color: rgb(74 222 128 / var(--tw-text-opacity));
    }

    .text-green-500 {
        --tw-text-opacity: 1;
        color: rgb(34 197 94 / var(--tw-text-opacity));
    }

    .text-green-600 {
        --tw-text-opacity: 1;
        color: rgb(22 163 74 / var(--tw-text-opacity));
    }

    .text-green-700 {
        --tw-text-opacity: 1;
        color: rgb(21 128 61 / var(--tw-text-opacity));
    }

    .text-green-800 {
        --tw-text-opacity: 1;
        color: rgb(22 101 52 / var(--tw-text-opacity));
    }

    .text-indigo-500 {
        --tw-text-opacity: 1;
        color: rgb(99 102 241 / var(--tw-text-opacity));
    }

    .text-indigo-600 {
        --tw-text-opacity: 1;
        color: rgb(79 70 229 / var(--tw-text-opacity));
    }

    .text-orange-500 {
        --tw-text-opacity: 1;
        color: rgb(249 115 22 / var(--tw-text-opacity));
    }

    .text-orange-700 {
        --tw-text-opacity: 1;
        color: rgb(194 65 12 / var(--tw-text-opacity));
    }

    .text-orange-800 {
        --tw-text-opacity: 1;
        color: rgb(154 52 18 / var(--tw-text-opacity));
    }

    .text-primary-500 {
        color: #e2702e9f;
    }

    .text-primary-800 {
        color: #e2702ec2;
    }

    .text-red-400 {
        --tw-text-opacity: 1;
        color: rgb(248 113 113 / var(--tw-text-opacity));
    }

    .text-red-500 {
        --tw-text-opacity: 1;
        color: rgb(239 68 68 / var(--tw-text-opacity));
    }

    .text-red-600 {
        --tw-text-opacity: 1;
        color: rgb(220 38 38 / var(--tw-text-opacity));
    }

    .text-red-700 {
        --tw-text-opacity: 1;
        color: rgb(185 28 28 / var(--tw-text-opacity));
    }

    .text-red-800 {
        --tw-text-opacity: 1;
        color: rgb(153 27 27 / var(--tw-text-opacity));
    }

    .text-slate-500 {
        --tw-text-opacity: 1;
        color: rgb(100 116 139 / var(--tw-text-opacity));
    }

    .text-slate-600 {
        --tw-text-opacity: 1;
        color: rgb(71 85 105 / var(--tw-text-opacity));
    }

    .text-slate-700 {
        --tw-text-opacity: 1;
        color: rgb(51 65 85 / var(--tw-text-opacity));
    }

    .text-white {
        --tw-text-opacity: 1;
        color: rgb(255 255 255 / var(--tw-text-opacity));
    }

    .text-yellow-400 {
        --tw-text-opacity: 1;
        color: rgb(250 204 21 / var(--tw-text-opacity));
    }

    .underline {
        text-decoration-line: underline;
    }

    .antialiased {
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    .opacity-0 {
        opacity: 0;
    }

    .opacity-100 {
        opacity: 1;
    }

    .opacity-25 {
        opacity: 0.25;
    }

    .opacity-50 {
        opacity: 0.5;
    }

    .opacity-75 {
        opacity: 0.75;
    }

    .shadow {
        --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
        --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    }

    .shadow-lg {
        --tw-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
        --tw-shadow-colored: 0 10px 15px -3px var(--tw-shadow-color), 0 4px 6px -4px var(--tw-shadow-color);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    }

    .shadow-md {
        --tw-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
        --tw-shadow-colored: 0 4px 6px -1px var(--tw-shadow-color), 0 2px 4px -2px var(--tw-shadow-color);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    }

    .shadow-sm {
        --tw-shadow: 0 1px 2px 0 rgb(0 0 0 / 0.05);
        --tw-shadow-colored: 0 1px 2px 0 var(--tw-shadow-color);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    }

    .shadow-xl {
        --tw-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        --tw-shadow-colored: 0 20px 25px -5px var(--tw-shadow-color), 0 8px 10px -6px var(--tw-shadow-color);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    }

    .shadow-primary-200 {
        --tw-shadow-color: #e2702e62;
        --tw-shadow: var(--tw-shadow-colored);
    }

    .ring-0 {
        --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
        --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(0px + var(--tw-ring-offset-width)) var(--tw-ring-color);
        box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
    }

    .ring-1 {
        --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
        --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);
        box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
    }

    .ring-black {
        --tw-ring-opacity: 1;
        --tw-ring-color: rgb(0 0 0 / var(--tw-ring-opacity));
    }

    .ring-gray-300 {
        --tw-ring-opacity: 1;
        --tw-ring-color: rgb(209 213 219 / var(--tw-ring-opacity));
    }

    .ring-indigo-500 {
        --tw-ring-opacity: 1;
        --tw-ring-color: rgb(99 102 241 / var(--tw-ring-opacity));
    }

    .ring-primary-300 {
        --tw-ring-color: #e2702e6c;
    }

    .ring-primary-500 {
        --tw-ring-color: #e2702e9f;
    }

    .ring-red-500 {
        --tw-ring-opacity: 1;
        --tw-ring-color: rgb(239 68 68 / var(--tw-ring-opacity));
    }

    .ring-opacity-5 {
        --tw-ring-opacity: 0.05;
    }

    .blur {
        --tw-blur: blur(8px);
        filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
    }

    .blur-sm {
        --tw-blur: blur(4px);
        filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
    }

    .filter {
        filter: var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow);
    }

    .transition {
        transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-backdrop-filter;
        transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;
        transition-property: color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-backdrop-filter;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 150ms;
    }

    .transition-all {
        transition-property: all;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 150ms;
    }

    .transition-colors {
        transition-property: color, background-color, border-color, text-decoration-color, fill, stroke;
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        transition-duration: 150ms;
    }

    .duration-150 {
        transition-duration: 150ms;
    }

    .duration-300 {
        transition-duration: 300ms;
    }

    .ease-in-out {
        transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
    }

    .\[mask-image\:radial-gradient\(ellipse_80\%_50\%_at_50\%_0\%\2c \#000_70\%\2c transparent_110\%\)\] {
        -webkit-mask-image: radial-gradient(ellipse 80% 50% at 50% 0%, #000 70%, transparent 110%);
        mask-image: radial-gradient(ellipse 80% 50% at 50% 0%, #000 70%, transparent 110%);
    }

    .\[text-shadow\:_0_1px_0_rgb\(0_0_0_\/_40\%\)\] {
        text-shadow: 0 1px 0 rgb(0 0 0 / 40%);
    }

    csad {
        color: #e2702e9f;
    }

    .checked\:bg-primary-800:checked {
        background-color: #e2702ec2;
    }

    .hover\:cursor-pointer:hover {
        cursor: pointer;
    }

    .hover\:border-gray-300:hover {
        --tw-border-opacity: 1;
        border-color: rgb(209 213 219 / var(--tw-border-opacity));
    }

    .hover\:bg-blue-100:hover {
        --tw-bg-opacity: 1;
        background-color: rgb(219 234 254 / var(--tw-bg-opacity));
    }

    .hover\:bg-gray-100:hover {
        --tw-bg-opacity: 1;
        background-color: rgb(243 244 246 / var(--tw-bg-opacity));
    }

    .hover\:bg-gray-400\/20:hover {
        background-color: rgb(156 163 175 / 0.2);
    }

    .hover\:bg-gray-50:hover {
        --tw-bg-opacity: 1;
        background-color: rgb(249 250 251 / var(--tw-bg-opacity));
    }

    .hover\:bg-green-100:hover {
        --tw-bg-opacity: 1;
        background-color: rgb(220 252 231 / var(--tw-bg-opacity));
    }

    .hover\:bg-indigo-700:hover {
        --tw-bg-opacity: 1;
        background-color: rgb(67 56 202 / var(--tw-bg-opacity));
    }

    .hover\:bg-orange-100:hover {
        --tw-bg-opacity: 1;
        background-color: rgb(255 237 213 / var(--tw-bg-opacity));
    }

    .hover\:bg-primary-500:hover {
        background-color: #e2702e9f;
    }

    .hover\:bg-primary-800:hover {
        background-color: #e2702ec2;
    }

    .hover\:bg-red-100:hover {
        --tw-bg-opacity: 1;
        background-color: rgb(254 226 226 / var(--tw-bg-opacity));
    }

    .hover\:bg-red-700:hover {
        --tw-bg-opacity: 1;
        background-color: rgb(185 28 28 / var(--tw-bg-opacity));
    }

    .hover\:bg-slate-300:hover {
        --tw-bg-opacity: 1;
        background-color: rgb(203 213 225 / var(--tw-bg-opacity));
    }

    .hover\:text-gray-400:hover {
        --tw-text-opacity: 1;
        color: rgb(156 163 175 / var(--tw-text-opacity));
    }

    .hover\:text-gray-500:hover {
        --tw-text-opacity: 1;
        color: rgb(107 114 128 / var(--tw-text-opacity));
    }

    .hover\:text-gray-700:hover {
        --tw-text-opacity: 1;
        color: rgb(55 65 81 / var(--tw-text-opacity));
    }

    .hover\:text-gray-800:hover {
        --tw-text-opacity: 1;
        color: rgb(31 41 55 / var(--tw-text-opacity));
    }

    .hover\:text-gray-900:hover {
        --tw-text-opacity: 1;
        color: rgb(17 24 39 / var(--tw-text-opacity));
    }

    .hover\:text-primary-800:hover {
        color: #e2702ec2;
    }

    .hover\:shadow-xl:hover {
        --tw-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        --tw-shadow-colored: 0 20px 25px -5px var(--tw-shadow-color), 0 8px 10px -6px var(--tw-shadow-color);
        box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow);
    }

    .hover\:shadow-primary-300:hover {
        --tw-shadow-color: #e2702e6c;
        --tw-shadow: var(--tw-shadow-colored);
    }

    .checked\:hover\:bg-primary-800:hover:checked {
        background-color: #e2702ec2;
    }

    .focus\:z-10:focus {
        z-index: 10;
    }

    .focus\:border-blue-300:focus {
        --tw-border-opacity: 1;
        border-color: rgb(147 197 253 / var(--tw-border-opacity));
    }

    .focus\:border-gray-300:focus {
        --tw-border-opacity: 1;
        border-color: rgb(209 213 219 / var(--tw-border-opacity));
    }

    .focus\:border-indigo-300:focus {
        --tw-border-opacity: 1;
        border-color: rgb(165 180 252 / var(--tw-border-opacity));
    }

    .focus\:border-indigo-500:focus {
        --tw-border-opacity: 1;
        border-color: rgb(99 102 241 / var(--tw-border-opacity));
    }

    .focus\:border-primary-300:focus {
        border-color: #e2702e6c;
    }

    .focus\:border-primary-500:focus {
        border-color: #e2702e9f;
    }

    .focus\:border-primary-800:focus {
        border-color: #e2702ec2;
    }

    .focus\:border-red-700:focus {
        --tw-border-opacity: 1;
        border-color: rgb(185 28 28 / var(--tw-border-opacity));
    }

    .focus\:bg-gray-100:focus {
        --tw-bg-opacity: 1;
        background-color: rgb(243 244 246 / var(--tw-bg-opacity));
    }

    .focus\:bg-gray-50:focus {
        --tw-bg-opacity: 1;
        background-color: rgb(249 250 251 / var(--tw-bg-opacity));
    }

    .focus\:bg-primary-200:focus {
        background-color: #e2702e62;
    }

    .focus\:text-gray-500:focus {
        --tw-text-opacity: 1;
        color: rgb(107 114 128 / var(--tw-text-opacity));
    }

    .focus\:text-gray-700:focus {
        --tw-text-opacity: 1;
        color: rgb(55 65 81 / var(--tw-text-opacity));
    }

    .focus\:text-gray-800:focus {
        --tw-text-opacity: 1;
        color: rgb(31 41 55 / var(--tw-text-opacity));
    }

    .focus\:text-primary-800:focus {
        color: #e2702ec2;
    }

    .focus\:outline-none:focus {
        outline: 2px solid transparent;
        outline-offset: 2px;
    }

    .focus\:ring:focus {
        --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
        --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(3px + var(--tw-ring-offset-width)) var(--tw-ring-color);
        box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
    }

    .focus\:ring-2:focus {
        --tw-ring-offset-shadow: var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);
        --tw-ring-shadow: var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);
        box-shadow: var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000);
    }

    .focus\:ring-blue-600:focus {
        --tw-ring-opacity: 1;
        --tw-ring-color: rgb(37 99 235 / var(--tw-ring-opacity));
    }

    .focus\:ring-green-600:focus {
        --tw-ring-opacity: 1;
        --tw-ring-color: rgb(22 163 74 / var(--tw-ring-opacity));
    }

    .focus\:ring-indigo-200:focus {
        --tw-ring-opacity: 1;
        --tw-ring-color: rgb(199 210 254 / var(--tw-ring-opacity));
    }

    .focus\:ring-indigo-500:focus {
        --tw-ring-opacity: 1;
        --tw-ring-color: rgb(99 102 241 / var(--tw-ring-opacity));
    }

    .focus\:ring-orange-600:focus {
        --tw-ring-opacity: 1;
        --tw-ring-color: rgb(234 88 12 / var(--tw-ring-opacity));
    }

    .focus\:ring-primary-200:focus {
        --tw-ring-color: #e2702e62;
    }

    .focus\:ring-primary-500:focus {
        --tw-ring-color: #e2702e9f;
    }

    .focus\:ring-red-200:focus {
        --tw-ring-opacity: 1;
        --tw-ring-color: rgb(254 202 202 / var(--tw-ring-opacity));
    }

    .focus\:ring-red-500:focus {
        --tw-ring-opacity: 1;
        --tw-ring-color: rgb(239 68 68 / var(--tw-ring-opacity));
    }

    .focus\:ring-red-600:focus {
        --tw-ring-opacity: 1;
        --tw-ring-color: rgb(220 38 38 / var(--tw-ring-opacity));
    }

    .focus\:ring-opacity-50:focus {
        --tw-ring-opacity: 0.5;
    }

    .focus\:ring-offset-2:focus {
        --tw-ring-offset-width: 2px;
    }

    .focus\:ring-offset-blue-50:focus {
        --tw-ring-offset-color: #eff6ff;
    }

    .focus\:ring-offset-green-50:focus {
        --tw-ring-offset-color: #f0fdf4;
    }

    .focus\:ring-offset-orange-50:focus {
        --tw-ring-offset-color: #fff7ed;
    }

    .focus\:ring-offset-red-50:focus {
        --tw-ring-offset-color: #fef2f2;
    }

    .checked\:focus\:bg-primary-800:focus:checked {
        background-color: #e2702ec2;
    }

    .active\:bg-gray-100:active {
        --tw-bg-opacity: 1;
        background-color: rgb(243 244 246 / var(--tw-bg-opacity));
    }

    .active\:text-gray-500:active {
        --tw-text-opacity: 1;
        color: rgb(107 114 128 / var(--tw-text-opacity));
    }

    .active\:text-gray-700:active {
        --tw-text-opacity: 1;
        color: rgb(55 65 81 / var(--tw-text-opacity));
    }

    .disabled\:cursor-not-allowed:disabled {
        cursor: not-allowed;
    }

    .disabled\:bg-gray-50:disabled {
        --tw-bg-opacity: 1;
        background-color: rgb(249 250 251 / var(--tw-bg-opacity));
    }

    .disabled\:opacity-50:disabled {
        opacity: 0.5;
    }

    .group:hover .group-hover\:stroke-primary-800 {
        stroke: #e2702ec2;
    }

    .group:hover .group-hover\:text-primary-800 {
        color: #e2702ec2;
    }

    :is([dir="rtl"] .rtl\:flex-row-reverse) {
        flex-direction: row-reverse;
    }

    @media (prefers-color-scheme: dark) {

        .dark\:border-gray-600 {
            --tw-border-opacity: 1;
            border-color: rgb(75 85 99 / var(--tw-border-opacity));
        }

        .dark\:bg-gray-800 {
            --tw-bg-opacity: 1;
            background-color: rgb(31 41 55 / var(--tw-bg-opacity));
        }

        .dark\:bg-gray-900 {
            --tw-bg-opacity: 1;
            background-color: rgb(17 24 39 / var(--tw-bg-opacity));
        }

        .dark\:text-gray-300 {
            --tw-text-opacity: 1;
            color: rgb(209 213 219 / var(--tw-text-opacity));
        }

        .dark\:text-gray-400 {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity));
        }

        .dark\:text-gray-600 {
            --tw-text-opacity: 1;
            color: rgb(75 85 99 / var(--tw-text-opacity));
        }

        .dark\:hover\:text-gray-300:hover {
            --tw-text-opacity: 1;
            color: rgb(209 213 219 / var(--tw-text-opacity));
        }

        .dark\:focus\:border-blue-700:focus {
            --tw-border-opacity: 1;
            border-color: rgb(29 78 216 / var(--tw-border-opacity));
        }

        .dark\:focus\:border-blue-800:focus {
            --tw-border-opacity: 1;
            border-color: rgb(30 64 175 / var(--tw-border-opacity));
        }

        .dark\:active\:bg-gray-700:active {
            --tw-bg-opacity: 1;
            background-color: rgb(55 65 81 / var(--tw-bg-opacity));
        }

        .dark\:active\:text-gray-300:active {
            --tw-text-opacity: 1;
            color: rgb(209 213 219 / var(--tw-text-opacity));
        }
    }

    @media not all and (min-width: 768px) {

        .max-md\:flex-col {
            flex-direction: column;
        }

        .max-md\:justify-center {
            justify-content: center;
        }
    }

    @media (min-width: 640px) {

        .sm\:order-4 {
            order: 4;
        }

        .sm\:order-5 {
            order: 5;
        }

        .sm\:order-6 {
            order: 6;
        }

        .sm\:-my-px {
            margin-top: -1px;
            margin-bottom: -1px;
        }

        .sm\:my-8 {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .sm\:-mr-3 {
            margin-right: -0.75rem;
        }

        .sm\:ml-10 {
            margin-left: 2.5rem;
        }

        .sm\:ml-3 {
            margin-left: 0.75rem;
        }

        .sm\:mr-3 {
            margin-right: 0.75rem;
        }

        .sm\:mt-0 {
            margin-top: 0px;
        }

        .sm\:mt-4 {
            margin-top: 1rem;
        }

        .sm\:inline {
            display: inline;
        }

        .sm\:flex {
            display: flex;
        }

        .sm\:hidden {
            display: none;
        }

        .sm\:w-auto {
            width: auto;
        }

        .sm\:w-full {
            width: 100%;
        }

        .sm\:max-w-lg {
            max-width: 32rem;
        }

        .sm\:max-w-md {
            max-width: 28rem;
        }

        .sm\:max-w-sm {
            max-width: 24rem;
        }

        .sm\:flex-1 {
            flex: 1 1 0%;
        }

        .sm\:translate-y-0 {
            --tw-translate-y: 0px;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .sm\:scale-100 {
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .sm\:scale-95 {
            --tw-scale-x: .95;
            --tw-scale-y: .95;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .sm\:grid-cols-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .sm\:items-start {
            align-items: flex-start;
        }

        .sm\:items-center {
            align-items: center;
        }

        .sm\:justify-start {
            justify-content: flex-start;
        }

        .sm\:justify-end {
            justify-content: flex-end;
        }

        .sm\:justify-center {
            justify-content: center;
        }

        .sm\:justify-between {
            justify-content: space-between;
        }

        .sm\:overflow-hidden {
            overflow: hidden;
        }

        .sm\:rounded-lg {
            border-radius: 0.5rem;
        }

        .sm\:rounded-md {
            border-radius: 0.375rem;
        }

        .sm\:p-0 {
            padding: 0px;
        }

        .sm\:p-6 {
            padding: 1.5rem;
        }

        .sm\:p-8 {
            padding: 2rem;
        }

        .sm\:px-0 {
            padding-left: 0px;
            padding-right: 0px;
        }

        .sm\:px-4 {
            padding-left: 1rem;
            padding-right: 1rem;
        }

        .sm\:px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem;
        }

        .sm\:px-px {
            padding-left: 1px;
            padding-right: 1px;
        }

        .sm\:pl-9 {
            padding-left: 2.25rem;
        }

        .sm\:pt-0 {
            padding-top: 0px;
        }

        .sm\:text-left {
            text-align: left;
        }

        .sm\:text-sm {
            font-size: 0.875rem;
            line-height: 1.25rem;
        }
    }

    @media (min-width: 768px) {

        .md\:flex {
            display: flex;
        }

        .md\:hidden {
            display: none;
        }

        .md\:max-w-lg {
            max-width: 32rem;
        }

        .md\:max-w-xl {
            max-width: 36rem;
        }

        .md\:flex-1 {
            flex: 1 1 0%;
        }

        .md\:grid-cols-2 {
            grid-template-columns: repeat(2, minmax(0, 1fr));
        }

        .md\:grid-cols-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .md\:flex-row {
            flex-direction: row;
        }

        .md\:items-center {
            align-items: center;
        }

        .md\:justify-between {
            justify-content: space-between;
        }

        .md\:text-4xl {
            font-size: 2.25rem;
            line-height: 2.5rem;
        }

        .md\:text-5xl {
            font-size: 3rem;
            line-height: 1;
        }

        .md\:text-xl {
            font-size: 1.25rem;
            line-height: 1.75rem;
        }
    }

    @media (min-width: 1024px) {

        .lg\:col-span-2 {
            grid-column: span 2 / span 2;
        }

        .lg\:block {
            display: block;
        }

        .lg\:max-w-2xl {
            max-width: 42rem;
        }

        .lg\:max-w-3xl {
            max-width: 48rem;
        }

        .lg\:grid-cols-3 {
            grid-template-columns: repeat(3, minmax(0, 1fr));
        }

        .lg\:grid-cols-4 {
            grid-template-columns: repeat(4, minmax(0, 1fr));
        }

        .lg\:px-8 {
            padding-left: 2rem;
            padding-right: 2rem;
        }
    }

    @media (min-width: 1280px) {

        .xl\:max-w-4xl {
            max-width: 56rem;
        }

        .xl\:max-w-5xl {
            max-width: 64rem;
        }
    }

    @media (min-width: 1536px) {

        .\32xl\:max-w-6xl {
            max-width: 72rem;
        }

        .\32xl\:max-w-7xl {
            max-width: 80rem;
        }
    }
</style>

<div class="py-12">
    <div class="max-w-2xl">


        <div class="flex flex-col gap-y-5">
            <h1 class="text-3xl font-bold">Informe de control a clase</h1>

            <div class="flex justify-between items-center">
                <div class="flex flex-col gap-1">
                    <span class="text-sm text-slate-700">{{ __('Profesor controlado') }}</span>
                    <p class="text-lg font-semibold">{{ $informe->controlado->name }}</p>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="text-sm text-slate-700">{{ __('Categoria docente') }}</span>
                    <p class="text-lg font-semibold">{{ $informe->controlado->category->name }}</p>
                </div>
            </div>

            <div class="flex justify-between items-center">
                <div class="flex flex-col gap-1">
                    <span class="text-sm text-slate-700">{{ __('Asignatura') }}</span>
                    <p class="text-lg font-semibold">{{ $informe->asignatura->name }}</p>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="text-sm text-slate-700">{{ __('Grupo') }}</span>
                    <p class="text-lg font-semibold">{{ $informe->grupo }}</p>
                </div>
            </div>

            <div class="flex flex-col gap-1">
                <span class="text-sm text-slate-700">{{ __('Titulo de la clase') }}</span>
                <p class="text-lg font-semibold">{{ $informe->titulo }}</p>
            </div>

            <div class="flex justify-between items-center">
                <div class="flex flex-col gap-1">
                    <span class="text-sm text-slate-700">{{ __('Profesor controlador') }}</span>
                    <p class="text-lg font-semibold">{{ $informe->controlador->name }}</p>
                </div>

                <div class="flex flex-col gap-1">
                    <span class="text-sm text-slate-700">{{ __('Categoria docente') }}</span>
                    <p class="text-lg font-semibold">{{ $informe->controlador->category->name }}</p>
                </div>
            </div>

            <div class="flex flex-col gap-1">
                <span class="text-sm text-slate-700">{{ __('Tipo de clase') }}</span>
                <p class="text-lg font-semibold">
                    {{ \App\Enum\ClassTypeEnum::TYPES[$informe->tipo_clase] }}
                </p>
            </div>

        </div>

        <hr class="my-5">

        <div class="flex flex-col gap-y-5">

            <div class="flex flex-col gap-1">
                <span class="text-sm text-slate-700">{{ __('Logros') }}</span>
                <p class="text-lg font-semibold">
                    {{ $informe->logros }}
                </p>
            </div>

            <div class="flex flex-col gap-1">
                <span class="text-sm text-slate-700">{{ __('Deficiencias') }}</span>
                <p class="text-lg font-semibold">
                    {{ $informe->deficiencias }}
                </p>
            </div>

            <div class="flex flex-col gap-1">
                <span class="text-sm text-slate-700">{{ __('Recomendaciones') }}</span>
                <p class="text-lg font-semibold">
                    {{ $informe->recomendaciones }}
                </p>
            </div>

            <div class="flex flex-col gap-1">
                <span class="text-sm text-slate-700">{{ __('Evaluación') }}</span>
                <p class="text-xl font-semibold">
                    {{ $informe->evaluation }}
                </p>
            </div>

            <div class="flex flex-col gap-1">
                <span class="text-sm text-slate-700">{{ __('Fecha de evaluación') }}</span>
                <p class="text-xl font-semibold">
                    {{ $informe->created_at }}
                </p>
            </div>

        </div>

    </div>
</div>