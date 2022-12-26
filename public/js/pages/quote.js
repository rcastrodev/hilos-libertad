let variablesProductsInStorage = JSON.parse(localStorage.getItem('variableProducts'))
let table = document.getElementById('table')

if (variablesProductsInStorage) 
    renderVariableProducts()

function selected(value, service){
    return value == service ? 'selected' : '' 
}

function renderVariableProducts()
{
    let html = ''
    let count = 0

    variablesProductsInStorage.forEach(variableProductsInStorage => {
        let selectColor = ''
        getColors(variableProductsInStorage.productID)
            .then(r => {
                selectColor = `<select name='variableproduct[${count}][color]' class='form-control'>`

                if(r.data.colors.length)
                {
                    r.data.colors.forEach( objColor => {
                        selectColor += `<option value='${objColor.name}' ${selected(variableProductsInStorage.color, objColor.name)}>${objColor.name}</option>` 
                    })
                }else{
                    selectColor += `<option value='Sin color'>Sin color</option>`   
                }

                selectColor += "</select>"

                html += `<tr>
                <td>
                    ${variableProductsInStorage.code}
                    <input type="hidden" name="variableproduct[${count}][code]" value="${variableProductsInStorage.code}" class="form-control">
                </td>
                <td>
                    ${variableProductsInStorage.product}
                    <input type="hidden" name="variableproduct[${count}][product]" value="${variableProductsInStorage.product}" class="form-control">
                </td>
                <td>
                    ${variableProductsInStorage.measure}
                    <input type="hidden" name="variableproduct[${count}][measure]" value="${variableProductsInStorage.measure}" class="form-control">
                </td>
                <td>
                    ${variableProductsInStorage.packaging}
                    <input type="hidden" name="variableproduct[${count}][packaging]" value="${variableProductsInStorage.packaging}" class="form-control">
                </td>
                <td>
                    ${selectColor}
                </td>
                <td>
                    
                    <select name="variableproduct[${count}][service]" class="form-control">
                        <option value="En carretel" ${selected(variableProductsInStorage.service, "En carretel")}>En carretel</option>
                        <option value="Cortado" ${selected(variableProductsInStorage.service, "Cortado")}>Cortado</option>
                        <option value="Punteado" ${selected(variableProductsInStorage.service, "Punteado")}>Punteado</option>
                    </select>
                </td>
                <td>
                    <div class="form-group">
                        <input type="number" name="variableproduct[${count}][quantity]" min="1" value="${variableProductsInStorage.quantity}" class="form-control">
                    </div>
                </td>
                <td class="text-center">
                    <button class="btn eliminar-item-presupuesto" data-id="${variableProductsInStorage.id}">x</button>
                </td>
            </tr>`
            ++count
            
            table.querySelector('tbody').innerHTML = html
            
        })
        selectColor = ''
    })
}

async function getColors(id)
{
    let root = document.querySelector('meta[name="url"]').getAttribute('content')
    try {
        let result = await axios.get(`${root}/producto/color/${id}`)
        return result
    } catch (error) {
        console.log(new Error(error))
    }
    
        
}

function destroyVariableProductsInStorage(e)
{
    e.preventDefault()
    if(e.target.classList.contains('eliminar-item-presupuesto'))
    {
        let btnDestroy = e.target
        btnDestroy.classList.add('btn-danger')

        

        variablesProductsInStorage = variablesProductsInStorage.filter( variableProductsInStorage => {
            if(variableProductsInStorage.id !== parseInt(btnDestroy.dataset.id))
                return variableProductsInStorage
        }) 

        localStorage.setItem('variableProducts', JSON.stringify(variablesProductsInStorage))

        setTimeout(() => {
            btnDestroy.closest('tr').remove()
            renderVariableProducts()
        }, 2000);

    }
}

table.addEventListener('click', destroyVariableProductsInStorage)