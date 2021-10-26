let player1Turn = 1;
let player2Turn = 1;
let turn = 0;
duplicateThrowElement(turn);

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
        saveTurnToDatabase($throws);
        duplicateThrowElement();
    }
})

function duplicateThrowElement()
{
    // Create a clone of element with id duplicate:
    let clone = document.getElementById('duplicate').cloneNode(true);
    clone.style.visibility = 'visible';
    let h10 = document.createElement('h10');
    let textElement = clone.querySelector('#text');
    if (turn % 2 === 0 || turn !== 1) {
        h10.appendChild(document.createTextNode('Beurt #' + player1Turn));

        textElement.setAttribute('id', 'text' + player1Turn);
        textElement.append(h10);

        // Change the id attribute of the newly created element:
        clone.setAttribute('id', "player1_turn" + player1Turn);

        let player1Container = document.getElementById('player' + 1);

        // Append the cloned element to the container
        player1Container.insertBefore(clone, player1Container.firstChild);
        player1Turn++;
    } else {
        h10.appendChild(document.createTextNode('Beurt #' + player2Turn));

        textElement.setAttribute('id', 'text' + player2Turn);
        textElement.append(h10);

        // Change the id attribute of the newly created element:
        clone.setAttribute('id', "player2_turn" + player2Turn);

        let player2Container = document.getElementById('player' + 2);

        // Append the cloned element to the container
        player2Container.insertBefore(clone, player2Container.firstChild);
        player2Turn++;
    }
    turn++;
}

function checkIfInputValid(input)
{
    let result = input.search(/(^[Bb][Ee]$)|(^[TtDd][1][0-9]$)|(^[TtDd][2][^1-9aA-zZ]$)|(^[TtDd][1-9]$)|(^[bB]$)|(^[1][0-9]$)|(^[2][^1-9aA-zZ]$)|(^[1-9]$)/);
    console.log(result);
    return result;
}

function saveTurnToDatabase(throws)
{
    $.ajax({
        type: "POST",
        url: '/turns/store',
        data: {
            data: 'test',
            id: fixtureId
        },
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });

}
