const modalAddress = document.querySelector(".dialog-add-address")
const buttonCloseAddress = document.querySelector(".dialog-address-button-close")
const buttonModalAddressOpen = document.querySelector(".open-modal-address")
const deleteAccount = document.querySelector(".user-data-remove-link")
const deleteAddress = document.querySelectorAll(".user-address-delete-btn")
const editUserData = document.querySelector(".user-btn-edit-address")

buttonModalAddressOpen.onclick = function () {
    modalAddress.showModal() 
}

buttonCloseAddress.onclick = function () {
    modalAddress.close()
}

deleteAccount.onclick = function (event) {
    if(!confirm("Deseja mesmo excluir sua conta?")){
        event.preventDefault()
    }
}

deleteAddress.forEach(button => {
    button.onclick = function (event) {
        if(!confirm("Deseja excluir esse endereço?")){
            event.preventDefault()
        }    
    }
})

editUserData.onclick = function (event){
    if(!confirm("Deseja mesmo excluir sua conta?")){
        event.preventDefault()
    }
}
