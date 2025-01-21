function annadirCarrito(e, cantidad = 1){
    const idProducto = e.target.id ? e.target.id : 32
    const estadoCarrito = comprobarCarrito(idProducto)
    console.log(localStorage.getItem('carrito'))

    let producto, carrito;

    switch(estadoCarrito){
        case 0: //crear carrito
            producto = `{[{id:${idProducto}, cantidad:${cantidad}}]}`
            localStorage.setItem('carrito', JSON.parse(producto))
            break
        case 1: //añadir producto
            producto = `{id:${idProducto}, cantidad:${cantidad}}`
            carrito = localStorage.getItem('carrito')
            console.log(carrito)
            carrito = { ...carrito, producto }
            console.log(JSON.parse(carrito))
            break
        case 2: //actualizar producto
            carrito = JSON.parse(localStorage.getItem('carrito'))
            carrito = { ...carrito, producto}
            console.log(carrito)
            break
    }
    
}

/**
 * @param id
 * el id a buscar
 * 
 * @returns
 * 0 no existe
 * 1 no incluye el id
 * 2 include el id
 **/

function comprobarCarrito(id){
    if(localStorage.getItem('carrito') == undefined){
        return 0
    }
    if(JSON.parse(localStorage.getItem('carrito')).includes(id)){
        return 2
    } else {
        return 1
    }
}