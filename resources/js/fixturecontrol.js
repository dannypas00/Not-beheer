document.addEventListener('DOMContentLoaded', (load) => {

    let turn = 0;
    duplicateThrowElement(turn);
    turn++;

    document.addEventListener("keydown", function(event) {

        if(event.which == 9) {
            let parent = event.composedPath();
            const activeTextarea = document.activeElement;

            if(activeTextarea.tagName == 'INPUT'){

                if(activeTextarea.value != '')
                    activeTextarea.setAttribute("disabled", "true");

                let inputs = parent[2].getElementsByTagName('input');
                let checkIfInputContainsValue = true;

                for (let index = 0; index < inputs.length; ++index) {

                    if (inputs[index].value == '') {
                        checkIfInputContainsValue = false;
                    }
                }

                if(checkIfInputContainsValue) {
                    duplicateThrowElement(turn, parent[3]);
                    turn++;
                }
            }
        }
    })
})


function duplicateThrowElement(turn){
    // Create a clone of element with id duplicate:
    let clone = document.querySelector('#duplicate').cloneNode( true );
    clone.style.visibility = 'visible';

    let div = document.createElement('h10');
    div.appendChild(document.createTextNode('Beurt #' + turn));

    console.log(clone.getElementsByTagName('text'));

    if(turn % 2  == 0) {
        // Change the id attribute of the newly created element:
        clone.setAttribute( 'id', "player1_turn" + turn);

        let player1Container = document.getElementById('player' + 1);

        // Append the cloned element to the container
        player1Container.insertBefore(clone, player1Container.firstChild);
    }
    else {
        // Change the id attribute of the newly created element:
        clone.setAttribute( 'id', "player2_turn" + turn);

        let player2Container = document.getElementById('player' + 2);

        // Append the cloned element to the container
        player2Container.insertBefore(clone, player2Container.firstChild);
    }
}






