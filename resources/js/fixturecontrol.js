let player1Turn = 1;
let player2Turn = 1;
let set = 1;
let turn = 0;
let playerStartedSet = 1;

createSet(set);
set++;

duplicateThrowElement(turn);
turn++;


let btn = document.createElement("button");
btn.innerHTML = "Save";
btn.addEventListener("click", function () {
    for (let i = set-1; i > 0; i--) {
        for (let j = 1; j < 3; j++) {
            document.getElementById('textplayer' + j + i).setAttribute('class', 'accordion-button collapsed');
            document.getElementById('collapseplayer' + j + i).setAttribute('class', 'accordion-collapse collapse');
        }
    }

    createSet(set);
    set++;

    player1Turn = 1;
    player2Turn = 1;
    turn = playerStartedSet;
    duplicateThrowElement(turn);
    turn++;
    playerStartedSet = turn;


});
document.body.appendChild(btn);


document.addEventListener("keydown", function(event) {

    if(event.which == 9) {
        let parent = event.composedPath();
        const activeTextarea = document.activeElement;

        if(activeTextarea.tagName == 'INPUT'){

            let inputs = parent[2].getElementsByTagName('input');
            let checkIfInputContainsValue = true;

            for (let index = 0; index < inputs.length; ++index) {
                if (inputs[index].value == '') {
                    checkIfInputContainsValue = false;
                }
            }

            if(checkIfInputContainsValue) {
                parent[4].getElementsByClassName('accordion-button')[0].setAttribute('class', 'accordion-button collapsed');
                parent[3].setAttribute('class', 'accordion-collapse collapse');
                duplicateThrowElement(turn);
                turn++;
            }
        }
    }
})

function duplicateThrowElement(turn){
    // Create a clone of element with id duplicate:
    let clone = document.getElementById('legDuplicate').cloneNode( true );
    clone.style.visibility = 'visible';

    let turnText = document.createElement('h10');
    let playerScoreElement = document.createElement('b');
    let whereTheTurnTextNeedToGo = clone.querySelector('#text');
    let collapseID = clone.querySelector('#collapseDuplicate');

    if(turn % 2  == 0) {
        createLeg('player1_',501, player1Turn, playerScoreElement, turnText, whereTheTurnTextNeedToGo, collapseID, clone);
        player1Turn++;
    }
    else {
        createLeg('player2_',100, player2Turn, playerScoreElement, turnText, whereTheTurnTextNeedToGo, collapseID, clone);
        player2Turn++;
    }

    turn++;
}

function createLeg(player, playerScore, playerTurn, playerScoreElement, turnText, whereTheTurnTextNeedToGo, collapseID, clone) {
    if(playerScore <= 0)
        return;

    turnText.appendChild(document.createTextNode('Beurt #' + playerTurn));
    playerScoreElement.setAttribute('class', 'b-text-right');
    //add the score to the textElement
    playerScoreElement.appendChild(document.createTextNode(playerScore));

    //id and data-bs-target needs to be the same for the accordion/collapse
    whereTheTurnTextNeedToGo.setAttribute('id', 'text' + player + playerTurn);
    whereTheTurnTextNeedToGo.setAttribute('data-bs-target', '#collapse' + player + playerTurn);
    collapseID.setAttribute('id', 'collapse' + player + playerTurn);

    // Change the id attribute of the newly created element:
    clone.setAttribute( 'id', "turn" + player + playerTurn);

    whereTheTurnTextNeedToGo.append(turnText);
    whereTheTurnTextNeedToGo.append(playerScoreElement);

    let playerContainer = document.getElementById(player + 'legs');

    // Append the duplicated element to the container
    playerContainer.insertBefore(clone, playerContainer.firstChild);
}

function createSet(set){
    createSetPlayer("player1", set);
    createSetPlayer('player2', set);
}

function createSetPlayer(player, set){
    let cloneSetPlayer = document.getElementById('setDuplicate').cloneNode( true );
    cloneSetPlayer.style.visibility = 'visible';
    cloneSetPlayer.setAttribute('id', 'set' + player + set);

    let playerContainer = document.getElementById(player);
    cloneSetPlayer.querySelector("#putAllLegsHere").setAttribute('id', player + '_legs');

    let whereTheTurnTextNeedToGo = cloneSetPlayer.querySelector('#text');
    let collapseID = cloneSetPlayer.querySelector('#collapseDuplicate');

    //id and data-bs-target needs to be the same for the accordion/collapse
    whereTheTurnTextNeedToGo.setAttribute('id', 'text' + player + set);
    whereTheTurnTextNeedToGo.setAttribute('data-bs-target', '#collapse' + player + set);
    collapseID.setAttribute('id', 'collapse' + player + set);

    //add set text
    let setText = document.createElement('b');
    setText.appendChild(document.createTextNode('Set ' + set));
    whereTheTurnTextNeedToGo.append(setText);

    // Append the duplicated element to the container
    playerContainer.insertBefore(cloneSetPlayer, playerContainer.firstChild);
}
