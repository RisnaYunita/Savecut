<!-- Footer-->
<footer class="content-footer footer bg-footer-theme">
  <div class="{{ (!empty($containerNav) ? $containerNav : 'container-fluid') }}">
    <div class="footer-container d-flex align-items-center justify-content-between py-3 flex-md-row flex-column">
      <div class="text-body mb-2 mb-md-0">
        © <script>
          document.write(new Date().getFullYear())
        </script>, made with <span class="text-danger"><i class="tf-icons mdi mdi-heart"></i></span> by <a href="{{ (!empty(config('variables.creatorUrl')) ? config('variables.creatorUrl') : '') }}" target="_blank" class="footer-link fw-medium">{{ (!empty(config('variables.creatorName')) ? config('variables.creatorName') : '') }}</a>
        <a  class="text-body" href="https://www.instagram.com/savecut.id/">
          <i class="mdi mdi-instagram"></i>
        </a>
        <a href="https://www.tiktok.com/@savecut.id">
          <svg fill="#99969c" width="15" height="15" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_412_113)"><path d="M33.4133 0.0533333C36.9067 0 40.3733 0.0266667 43.84 0C44.0533 4.08 45.52 8.24 48.5067 11.12C51.4933 14.08 55.7067 15.44 59.8133 15.8933V26.64C55.9733 26.5067 52.1067 25.7067 48.6133 24.0533C47.0933 23.36 45.68 22.48 44.2933 21.5733C44.2667 29.36 44.32 37.1467 44.24 44.9067C44.0267 48.64 42.8 52.3467 40.64 55.4133C37.1467 60.5333 31.0933 63.8667 24.88 63.9733C21.0667 64.1867 17.2533 63.1467 14 61.2267C8.61334 58.0533 4.82668 52.24 4.26668 46C4.21334 44.6667 4.18668 43.3333 4.24001 42.0267C4.72001 36.96 7.22668 32.1067 11.12 28.8C15.5467 24.96 21.7333 23.12 27.52 24.2133C27.5733 28.16 27.4133 32.1067 27.4133 36.0533C24.7733 35.2 21.68 35.44 19.36 37.04C17.68 38.1333 16.4 39.8133 15.7333 41.7067C15.1733 43.0667 15.3333 44.56 15.36 46C16 50.3733 20.2133 54.0533 24.6933 53.6533C27.68 53.6267 30.5333 51.8933 32.08 49.36C32.5867 48.48 33.1467 47.5733 33.1733 46.5333C33.44 41.76 33.3333 37.0133 33.36 32.24C33.3867 21.4933 33.3333 10.7733 33.4133 0.0533333Z"/></g><defs><clipPath id="clip0_412_113"><rect width="64" height="64" fill="white"/></clipPath></defs></svg>
        </a>
      </div>
      <div class="d-flex flex-column flex-sm-row">
        <p>Save Your Time, Elevate Your Style</p>
      </div>
    </div>
  </div>
</footer>
<!--/ Footer-->
