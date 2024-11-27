// JavaScript code to inject the loader
const loaderHTML = `
<center>
  <div class="loader loader--style4" title="3">
    <center>
    Fetching Data...
    </center>
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
      width="24px" height="24px" viewBox="0 0 24 24" style="enable-background:new 0 0 50 50;" xml:space="preserve">
      <rect x="0" y="0" width="4" height="7" fill="#333">
        <animateTransform  attributeType="xml"
          attributeName="transform" type="scale"
          values="1,1; 1,3; 1,1"
          begin="0s" dur="0.6s" repeatCount="indefinite" />       
      </rect>

      <rect x="10" y="0" width="4" height="7" fill="#333">
        <animateTransform  attributeType="xml"
          attributeName="transform" type="scale"
          values="1,1; 1,3; 1,1"
          begin="0.2s" dur="0.6s" repeatCount="indefinite" />       
      </rect>
      <rect x="20" y="0" width="4" height="7" fill="#333">
        <animateTransform  attributeType="xml"
          attributeName="transform" type="scale"
          values="1,1; 1,3; 1,1"
          begin="0.4s" dur="0.6s" repeatCount="indefinite" />       
      </rect>
    </svg>
  </div>
</center>

`;

// Function to inject the loader
function injectLoader(idLoadingContainer) {
  document.getElementById(idLoadingContainer).innerHTML = loaderHTML;
}

// Function to remove the loader
function removeLoader(idLoadingContainer) {
  document.getElementById(idLoadingContainer).innerHTML = '';
}


const loaderBarHTML = `
<div class="loading-bar-container">
<div class="moving-element"></div>
</div>
`

// Function to inject the loader
function injectBarLoader(idLoadingContainer) {
  document.getElementById(idLoadingContainer).innerHTML = loaderBarHTML;
}

// Function to remove the loader
function removeBarLoader(idLoadingContainer) {
  document.getElementById(idLoadingContainer).innerHTML = '';
}


// JavaScript code to inject the loader
const loaderHTMLWithoutText = `
<center>
<center>
Memproses...
</center>
  
  <div class="loaderV2 loader--style4" title="3">
    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
      width="24px" height="24px" viewBox="0 0 24 24" style="enable-background:new 0 0 50 50;" xml:space="preserve">
      <rect x="0" y="0" width="4" height="7" fill="#333">
        <animateTransform  attributeType="xml"
          attributeName="transform" type="scale"
          values="1,1; 1,3; 1,1"
          begin="0s" dur="0.6s" repeatCount="indefinite" />       
      </rect>

      <rect x="10" y="0" width="4" height="7" fill="#333">
        <animateTransform  attributeType="xml"
          attributeName="transform" type="scale"
          values="1,1; 1,3; 1,1"
          begin="0.2s" dur="0.6s" repeatCount="indefinite" />       
      </rect>
      <rect x="20" y="0" width="4" height="7" fill="#333">
        <animateTransform  attributeType="xml"
          attributeName="transform" type="scale"
          values="1,1; 1,3; 1,1"
          begin="0.4s" dur="0.6s" repeatCount="indefinite" />       
      </rect>
    </svg>
  </div>
</center>

`;


// Function to inject the loader
function injectLoaderWithoutText(idLoadingContainer) {
  document.getElementById(idLoadingContainer).innerHTML = loaderHTMLWithoutText;
}

// Function to remove the loader
function removeLoader(idLoadingContainer) {
  document.getElementById(idLoadingContainer).innerHTML = '';
}

