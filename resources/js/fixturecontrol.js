document.addEventListener('DOMContentLoaded', (load) => {


    for (let i = 1; i < 3; i++) {
        // Create a clone of element with id duplicate:
        let clone = document.querySelector('#duplicate').cloneNode( true );

        // Change the id attribute of the newly created element:
        clone.setAttribute( 'id', i );
        clone.style.visibility = 'visible';

        // Append the newly created element on parent from the event
        document.getElementById('player_' + i).append(clone);
    }



    document.addEventListener("keydown", function(event) {

        if(event.which == 9)
        {
            let parent = event.composedPath();
            const activeTextarea = document.activeElement;

            if(activeTextarea.value != '')
                activeTextarea.setAttribute("disabled", "true");

            console.log(parent);

            if(parent[2].firstChild.value != '')
            {
                // Create a clone of element with id duplicate:
                let clone = document.querySelector('#duplicate').cloneNode( true );

                // Change the id attribute of the newly created element:
                clone.setAttribute( 'id', "testid" );
                clone.style.visibility = 'visible';

                // Append the newly created element on parent from the event
                parent[3].insertBefore( clone , parent[3].firstChild);
            }
        }
    })
})









