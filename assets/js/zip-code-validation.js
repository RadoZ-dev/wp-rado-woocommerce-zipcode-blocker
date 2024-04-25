( () => {
  window.addEventListener( 'load', () => {
    const zipCodeInputField = document.getElementById( 'shipping-postcode' );
    const ZipCodeInputContainer = document.querySelector( '.wc-block-components-address-form__postcode' );
    const warning = 'Unfortunately, we don\'t ship to this location.';
    let timer;

    const displayWarning = () => {
      ZipCodeInputContainer.classList.add( 'has-error' );

      const warningParagraph = document.createElement( 'p' );

      warningParagraph.classList.add( 'wrong-zip-code-warning' );
      warningParagraph.style.cssText = 'color: #cc1818; font-size: 10px; margin: 5px 0 0; width: 50%;';
      warningParagraph.innerHTML = warning;

      ZipCodeInputContainer.appendChild( warningParagraph );
    };


    if( zipCodeInputField ) 
    {
      zipCodeInputField.addEventListener( 'input', ( event ) => {
        let zipCodeValue = event.target.value;

        clearTimeout( timer );
        
        if( zipCodes.includes( zipCodeValue ) && zipCodeValue.length >= 5 ) 
        {
          timer = setTimeout( () => {
            displayWarning();
          }, 500); 
        }
        else 
        {
          ZipCodeInputContainer.classList.remove( 'has-error' );

          const warningParagraph = ZipCodeInputContainer.querySelector( '.wrong-zip-code-warning' );

          if( warningParagraph ) 
          {
            ZipCodeInputContainer.removeChild( warningParagraph );
          }
        }
      } );
    }
  } );
} )();