let buttonsAddVariableProductToQoute = document.querySelectorAll('.add-variable-product-to-qoute')
    
function searchInLocalStorage(id){
    return variablesProductsInStorage.find(variableProduct => variableProduct.id == id)
}

let variablesProductsInStorage = JSON.parse(localStorage.getItem('variableProducts')) 


function addVariableProductToQoute(e){
    e.preventDefault()
    let tr = this.closest('tr')
    let number = parseInt(tr.querySelector('input[type="number"]').value) 


    
    if(number > 0){
        let variableProductID = parseInt(this.dataset.id) 
        let variableProductInSession = null
        let color = tr.querySelector('select[name="color"]')
        let service = tr.querySelector('select[name="service"]')        

        let obj = {
            id: variableProductID,
            productID: this.dataset.productid,
            product: this.dataset.product,
            color: color.options[color.selectedIndex].value,
            service: service.options[service.selectedIndex].value,
            code: this.dataset.code, 
            measure: this.dataset.measure, 
            packaging: this.dataset.packaging, 
            quantity: number
        }
         
        if(variablesProductsInStorage)
            variableProductInSession = searchInLocalStorage(variableProductID)
    
        if(variablesProductsInStorage && variableProductInSession){
            variablesProductsInStorage = variablesProductsInStorage.map(obj => {
                if(obj.id == variableProductID) obj.quantity += number
                return obj
            })
            localStorage.setItem('variableProducts', JSON.stringify(variablesProductsInStorage))
        }else if(variablesProductsInStorage){
            variablesProductsInStorage.push(obj)
            localStorage.setItem('variableProducts', JSON.stringify(variablesProductsInStorage))
        } else {
            localStorage.setItem('variableProducts', JSON.stringify([obj]))
        }

        this.textContent = 'Agregado'

        setTimeout(() => {
            tr.remove()
        }, 2000);
        
    }else{

        this.classList.remove('btn-outline-primary')
        this.classList.add('btn-outline-danger')

        setTimeout(() => {
            this.classList.remove('btn-outline-danger')
            this.classList.add('btn-outline-primary')  
        }, 3000);
    }
}

buttonsAddVariableProductToQoute.forEach(buttonAddVariableProductToQoute => {
    buttonAddVariableProductToQoute.addEventListener('click', addVariableProductToQoute)
});