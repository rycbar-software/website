import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

(() => {
    const fontRaleway = new FontFaceObserver('Raleway', {
        weight: 400
    });
    fontRaleway.load().then(function(){
        document.querySelector('body').classList.add('font-raleway-loaded');
    });
})();
