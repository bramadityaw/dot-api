// This script is a generic script that can be used
// to delete any resource from a resource index page
// through a confirmation modal dialog.
//
// This script expects only one dialog element where
// it is included.
//
// It expects two constants to be defined in the blade
// template it is included:
//  _token: The CSRF token
//  _route: The DELETE route, without the id

let id;
const dialog = document.querySelector("dialog");
const deleteButtons = document.querySelectorAll(".delete");

deleteButtons.forEach(button => {
    button.addEventListener("click", e => deleteHandler(e));
});

const confirmDeleteButton = dialog.querySelector("#confirmDeleteButton");
confirmDeleteButton.addEventListener("click", async (e) => {
    e.preventDefault();
    const form = new FormData();
    const uri = `${_route}/${id ?? ''}`;
    form.append('_token', _token);
    await fetch(uri, {
        method: 'DELETE',
        headers: {
            'X-CSRF-TOKEN': _token,
            'Content-Type': 'application/json',
        },
        body: form,
    })
        .catch(e => {
            console.error(e);
        });
    dialog.close();
    location.reload();
})

const deleteHandler = function(e) {
    const btn = e.target;
    id = btn.dataset.id;

    dialog.showModal();
}
