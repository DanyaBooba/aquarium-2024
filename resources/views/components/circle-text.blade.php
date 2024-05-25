<section>
  <svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
    <path id="circlePath" fill="none" stroke-width="4" stroke="hsl(0 100% 50% / 0.5)" d="
          M 10, 50
          a 40,40 0 1,1 80,0
          a 40,40 0 1,1 -80,0
        " />
    <text id="text" font-family="monospace" font-size="12" font-weight="bold" fill="var(--text-color)">
      <textPath id="textPath" href="#circlePath">
        {{ $slot }}
      </textPath>
    </text>
  </svg>
</section>
