$(document).ready(function () {
    // Obtener la lista de productos al cargar la página
    getProductos();

    // Manejar el evento de enviar el formulario para agregar un nuevo producto
    $('#agregar-producto-form').submit(function (event) {
        event.preventDefault();
        var form = $(this);
        var formData = form.serialize();
        registrarProducto(formData);
    });
});

// Obtener la lista de productos desde la API REST
function getProductos() {
    $.ajax({
        url: 'http://localhost/web_service_poli/productos.php',
        method: 'GET',
        dataType: 'json'
    }).done(function (data) {
        mostrarProductos(data);
    }).fail(function () {
        alert('Error al obtener la lista de productos');
    });
}

// Mostrar la lista de productos en la tabla
function mostrarProductos(productos) {
    var productosTableBody = $('#productos-table-body');
    productosTableBody.empty();
    $.each(productos, function (index, producto) {
        var tr = $('<tr>');
        tr.append('<td>' + producto.cod_producto + '</td>');
        tr.append('<td>' + producto.name_producto + '</td>');
        tr.append('<td>' + producto.category_producto + '</td>');
        tr.append('<td>' + producto.description_producto + '</td>');
        tr.append('<td>' + producto.price_producto + '</td>');
        tr.append('<td>' + producto.status_producto + '</td>');
        tr.append('<td><button class="btn btn-sm btn-primary editar-producto-btn" data-cod_producto="' + producto.cod_producto + '">Editar</button> <button class="btn btn-sm btn-danger eliminar-producto-btn" data-cod_producto="' + producto.cod_producto + '">Eliminar</button></td>');
        productosTableBody.append(tr);
    });
}


function registrarProducto() {
    var cod_producto = $('#cod_producto').val();
    var name_producto = $('#name_producto').val();
    var category_producto = $('#category_producto').val();
    var description_producto = $('#description_producto').val();
    var price_producto = $('#price_producto').val();
    var status_producto = $('#status_producto').val();
    

    var nuevoProducto = {
      cod_producto: cod_producto,
      name_producto: name_producto,
      category_producto: category_producto,
      description_producto: description_producto,
      price_producto: price_producto,
      status_producto: status_producto
    };

    console.log(nuevoProducto);

    $.ajax({
        url: 'http://localhost/web_service_poli/productos.php',
        method: 'POST',
        data: nuevoProducto,
        dataType: 'json'
    }).done(function (data) {
        alert('Producto registrado exitosamente');
        form.trigger('reset');
        getProductos();
    }).fail(function (jqXHR, textStatus, errorThrown) {
        alert('Error al registrar el producto: ' + errorThrown);
    });
  }