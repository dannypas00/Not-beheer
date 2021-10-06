let player1Turn = 1;
let player2Turn = 1;
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
                duplicateThrowElement(turn);
                turn++;
            }
        }
    }
})

function duplicateThrowElement(turn){
    // Create a clone of element with id duplicate:
    let clone = document.getElementById('duplicate').cloneNode( true );
    clone.style.visibility = 'visible';

    let h10 = document.createElement('h10');
    let textElement = clone.querySelector('#text');

    if(turn % 2  == 0) {
        h10.appendChild(document.createTextNode('Beurt #' + player1Turn));

        textElement.setAttribute('id', 'text' + player1Turn);
        textElement.append(h10);

        // Change the id attribute of the newly created element:
        clone.setAttribute( 'id', "player1_turn" + player1Turn);

        let player1Container = document.getElementById('player' + 1);

        // Append the cloned element to the container
        player1Container.insertBefore(clone, player1Container.firstChild);
        player1Turn++;
    }
    else {
        h10.appendChild(document.createTextNode('Beurt #' + player2Turn));

        textElement.setAttribute('id', 'text' + player2Turn);
        textElement.append(h10);

        // Change the id attribute of the newly created element:
        clone.setAttribute( 'id', "player2_turn" + player2Turn);

        let player2Container = document.getElementById('player' + 2);

        // Append the cloned element to the container
        player2Container.insertBefore(clone, player2Container.firstChild);

        player2Turn++;
    }
}
