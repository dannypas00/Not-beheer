let player1Turn = 1;
let player2Turn = 1;
let leg = 1;
let set = 1;
let turn = 0;
let playerStartedLeg = 1;
let currentScorePlayer1 = 501;
let currentScorePlayer2 = 501;
//TODO

console.log(fixture);
if (fixture.style === 'sets') {
    createSet("setOrLegPosition", set);
    createLeg('legsLocation_' + set, leg);
} else if (fixture.style === 'legs') {
    createLeg("setOrLegPosition", leg);
}

duplicateThrowElement(turn);
turn++;

//TODO
let legBtn = document.createElement("addnewleg");
legBtn.innerHTML = "Addnewleg";
legBtn.addEventListener("click", function () {
    addNewLeg();
});

let setBtn = document.createElement("addnewset");
setBtn.innerHTML = "Addnewset";
setBtn.addEventListener("click", function () {
    addNewSet();
});
document.body.appendChild(setBtn);
document.body.appendChild(legBtn);
//TODO^^


document.addEventListener("keydown", function (event) {

    if (event.which === 9) {
        let parent = event.composedPath();
        const activeTextarea = document.activeElement;
        let inputs = parent[2].getElementsByTagName('input');
        if (activeTextarea.tagName === 'INPUT') {
            if (activeTextarea.value !== '') {
                if (checkIfInputValid(activeTextarea.value) === 0) {
                    activeTextarea.setAttribute("disabled", "true");
                }
            }

            for (let index = 0; index < inputs.length; index++) {
                if (checkIfInputValid(inputs[index].value) === -1) {
                    return;
                }
            }
        }
        let $throws = [];
        for (let index = 0; index < inputs.length; index++) {
            $throws.push(inputs[index].value);
        }

        parent[4].getElementsByClassName('accordion-button')[0].setAttribute('class', 'accordion-button collapsed');
        parent[3].setAttribute('class', 'accordion-collapse collapse');
        saveTurnToDatabase($throws);
    }
})

function addNewLeg() {
    for (let i = 1; i <= leg; i++) {
        document.getElementById('text' + i).setAttribute('class', 'accordion-button collapsed');
        document.getElementById('collapse' + i).setAttribute('class', 'accordion-collapse collapse');
    }

    leg++;

    if (fixture.style === 'sets') {
        createLeg('legsLocation_' + set, leg);
    }
    if (fixture.style === 'legs') {
        createLeg("setOrLegPosition", leg);
    }

    player1Turn = 1;
    player2Turn = 1;
    //turn = playerStartedLeg;
    duplicateThrowElement(turn);
    turn++;
    //playerStartedLeg = turn;
}

function addNewSet() {
    for (let i = 1; i <= set; i++) {
        document.getElementById('setText' + i).setAttribute('class', 'accordion-button collapsed');
        document.getElementById('setCollapse' + i).setAttribute('class', 'accordion-collapse collapse');
    }

    set++;
    leg = 1;
    player1Turn = 1;
    player2Turn = 1;

    if (fixture.style === 'sets') {
        createSet("setOrLegPosition", set);
        createLeg('legsLocation_' + set, leg);
        duplicateThrowElement(turn);
        turn++;
    }
}

function duplicateThrowElement(turn) {
    // Create a clone of element with id duplicate:
    let clone = document.getElementById('turnDuplicate').cloneNode(true);
    clone.style.visibility = 'visible';

    let turnText = document.createElement('h10');
    let playerScoreElement = document.createElement('b');
    let whereTheTurnTextNeedToGo = clone.querySelector('#text');
    let collapseID = clone.querySelector('#collapseDuplicate');

    if (turn % 2 === 0) {
        createTurn('player1_', currentScorePlayer1, player1Turn, playerScoreElement, turnText, whereTheTurnTextNeedToGo, collapseID, clone);
        player1Turn++;
    } else {
        createTurn('player2_', currentScorePlayer2, player2Turn, playerScoreElement, turnText, whereTheTurnTextNeedToGo, collapseID, clone);
        player2Turn++;
    }
}

function createTurn(player, playerScore, playerTurn, playerScoreElement, turnText, whereTheTurnTextNeedToGo, collapseID, clone) {
    if (playerScore <= 0) {
        return;
    }

    turnText.appendChild(document.createTextNode('Beurt #' + playerTurn));
    playerScoreElement.setAttribute('class', 'b-text-right');
    //add the score to the textElement
    playerScoreElement.appendChild(document.createTextNode(playerScore));

    //id and data-bs-target needs to be the same for the accordion/collapse
    whereTheTurnTextNeedToGo.setAttribute('id', 'text' + player + playerTurn);
    whereTheTurnTextNeedToGo.setAttribute('data-bs-target', '#collapse' + player + playerTurn);
    collapseID.setAttribute('id', 'collapse' + player + playerTurn);

    // Change the id attribute of the newly created element:
    clone.setAttribute('id', 'turn' + player + playerTurn);

    whereTheTurnTextNeedToGo.append(turnText);
    whereTheTurnTextNeedToGo.append(playerScoreElement);

    let playerContainer = document.getElementById('set_' + set + 'leg_' + leg + player);

    // Append the duplicated element to the container
    playerContainer.insertBefore(clone, playerContainer.firstChild);
}

function createLeg(elementLocation, leg) {
    let cloneLeg = document.getElementById('legDuplicate').cloneNode(true);
    cloneLeg.style.visibility = 'visible';
    cloneLeg.setAttribute('id', 'leg_' + leg);

    let playerContainer = document.getElementById(elementLocation);
    cloneLeg.querySelector("#turnsHere").setAttribute('id', 'legs_' + leg);

    let legTextLocation = cloneLeg.querySelector('#text');
    let collapseID = cloneLeg.querySelector('#collapseDuplicate');
    let player1TurnsPos = cloneLeg.querySelector('#player1_');
    let player2TurnsPos = cloneLeg.querySelector('#player2_');

    player1TurnsPos.setAttribute('id', 'set_' + set + 'leg_' + leg + "player1_");
    player2TurnsPos.setAttribute('id', 'set_' + set + 'leg_' + leg + "player2_")

    //id and data-bs-target needs to be the same for the accordion/collapse
    legTextLocation.setAttribute('id', 'text' + leg);
    legTextLocation.setAttribute('data-bs-target', '#collapse' + leg);
    collapseID.setAttribute('id', 'collapse' + leg);

    //add leg text
    let legText = document.createElement('b');
    legText.appendChild(document.createTextNode('Leg ' + leg));
    legTextLocation.append(legText);

    // Append the duplicated element to the container
    playerContainer.insertBefore(cloneLeg, playerContainer.firstChild);
}

function createSet(elementLocation, set) {
    let cloneSet = document.getElementById('setDuplicate').cloneNode(true);
    cloneSet.style.visibility = 'visible';
    cloneSet.setAttribute('id', 'set_' + set);

    let playerContainer = document.getElementById(elementLocation);
    cloneSet.querySelector("#legPosition").setAttribute('id', 'legsLocation_' + set);

    let SetTextLocation = cloneSet.querySelector('#text');
    let collapseID = cloneSet.querySelector('#collapseDuplicate');

    //id and data-bs-target needs to be the same for the accordion/collapse
    SetTextLocation.setAttribute('id', 'setText' + set);
    SetTextLocation.setAttribute('data-bs-target', '#setCollapse' + set);
    collapseID.setAttribute('id', 'setCollapse' + set);

    //add set text
    let setText = document.createElement('b');
    setText.appendChild(document.createTextNode('Set ' + set));
    SetTextLocation.append(setText);

    // Append the duplicated element to the container
    playerContainer.insertBefore(cloneSet, playerContainer.firstChild);
}

function checkIfInputValid(input) {
    let result = input.search(/(^[Bb][Ee]$)|(^[TtDd][1][0-9]$)|(^[TtDd][2][^1-9aA-zZ]$)|(^[TtDd][1-9]$)|(^[bB]$)|(^[1][0-9]$)|(^[2][^1-9aA-zZ]$)|(^[1-9]$)/);
    console.log(result);
    return result;
}

function saveTurnToDatabase(throws) {
    let currentPlayer = turn % 2 === 0 ? fixture.player_1 : fixture.player_2;

    $.ajax({
        type: "POST",
        url: '/turns/store',
        data: {
            throw1: throws[0],
            throw2: throws[1],
            throw3: throws[2],
            leg: legId,
            setId: setId,
            fixtureId: fixture.id,
            player: currentPlayer
        },
        success: function (data) {

            newTurn(data);
        },
        error: function () {
            alert('Error occured');
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },

    });
}

function newTurn(data) {
    console.log(data);

    //addNewLeg();
    //addNewSet();
    // if (data.set != null){
    //
    // }
    // if (data.leg != null){
    //
    // }
}
