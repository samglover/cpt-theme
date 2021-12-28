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

  let intervalID;
  let opacity;
  let modal       = [
    document.querySelector( '#' + ID + ' .modal' ),
    document.querySelector( '#' + ID + ' .modal-screen' ),
  ];
  let increment   = [
    Number( window.getComputedStyle( modal[ 0 ] ).getPropertyValue( 'opacity' ) ) / 10,
    Number( window.getComputedStyle( modal[ 1 ] ).getPropertyValue( 'opacity' ) ) / 10,
  ];
  let done        = modal;

  intervalID = setInterval( fadeOut, 20 );

  function fadeOut() {

    modal.forEach( function( e, i ) {

      if ( done[ i ] !== true ) {

        opacity = Number( window.getComputedStyle( e ).getPropertyValue( 'opacity' ) );

        if ( opacity > 0 ) {

          opacity = opacity - increment[ i ];
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