const todos = document.querySelectorAll("div.cont > .number_compra");

console.log(todos);
let cont_todos = 0;

todos.forEach((e) => {
    e.addEventListener("click", () => {
        cont_todos += 1;
        todos.forEach((actualizar) =>{
            actualizar.innerHTML=cont_todos;
        })
    })
});