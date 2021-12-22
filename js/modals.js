function showModal( ID ) {

  event.preventDefault();

  let modal = [
    document.querySelector( '#' + ID + ' .modal' ),
    document.querySelector( '#' + ID + ' .modal-screen' ),
  ];

  modal.forEach( function( e ) {
    e.style.display = "block";
  });

}

function closeModal( ID ) {

  let opacity     = 0;
  let intervalID;
  let modal       = [
    document.querySelector( '#' + ID + ' .modal' ),
    document.querySelector( '#' + ID + ' .modal-screen' ),
  ];
  let done        = modal;

  intervalID = setInterval( fade, 20 );

  function fade() {

    modal.forEach( function( e, i ) {

      if ( done[ i ] !== true ) {

        opacity = Number( window.getComputedStyle( e ).getPropertyValue( 'opacity' ) );

        if ( opacity > 0 ) {

          opacity = opacity - 0.1;
          e.style.opacity = opacity;

        } else {

          e.style.display = "none";
          e.style.opacity = null;

          done[ i ] = true;

        }

      }

    });

    if ( done.every( function( e ) { e ? true : false; } ) ) {
      clearInterval( intervalID );
    }

  }

}
