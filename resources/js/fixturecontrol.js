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

    let turnText = document.createElement('h10');
    let playerScoreElement = document.createElement('b');
    let whereTheTurnTextNeedToGo = clone.querySelector('#text');
    let collapseID = clone.querySelector('#collapseDuplicate');

    if(turn % 2  == 0) {

        let duplicatedElement = createCloneElement('Player1_',501, player1Turn, playerScoreElement, turnText, whereTheTurnTextNeedToGo, collapseID, clone);
        let player1Container = document.getElementById('player1');

        // Append the duplicated element to the container
        player1Container.insertBefore(duplicatedElement, player1Container.firstChild);
        player1Turn++;
    }
    else {

        let duplicatedElement = createCloneElement('Player2_',501, player2Turn, playerScoreElement, turnText, whereTheTurnTextNeedToGo, collapseID, clone);

        let player2Container = document.getElementById('player2');

        // Append the duplicated element to the container
        player2Container.insertBefore(duplicatedElement, player2Container.firstChild);
        player2Turn++;
    }

    whereTheTurnTextNeedToGo.append(turnText);
    whereTheTurnTextNeedToGo.append(playerScoreElement);
}

function createCloneElement(player, playerScore, playerTurn, playerScoreElement, turnText, whereTheTurnTextNeedToGo, collapseID, clone) {
    turnText.appendChild(document.createTextNode('Beurt #' + playerTurn));

    playerScoreElement.setAttribute('class', 'b-text-right');
    //add the score to the textElement
    playerScoreElement.appendChild(document.createTextNode(playerScore));

    whereTheTurnTextNeedToGo.setAttribute('id', 'text' + player + playerTurn);
    whereTheTurnTextNeedToGo.setAttribute('data-bs-target', '#collapse' + player + playerTurn);

    collapseID.setAttribute('id', 'collapse' + player + playerTurn);

    // Change the id attribute of the newly created element:
    clone.setAttribute( 'id', "turn" + player + playerTurn);

    return clone;
}
