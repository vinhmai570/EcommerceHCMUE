<script>
	jQuery(document).ready(function() {
        $("#btn-store-variant").on("click", function() {
            url        = '{{ route('api.v1.admin.product_skus.store') }}';
            const formData = new FormData();
            product_id = $("#product_id").val();
            sku        = $("#sku").val();
            price      = $("#price").val();
            sale_price = $("#sale_price").val();
            quantity   = $("#quantity").val();
            image      = $("#image")[0].files[0];
            is_default = $("#is_default").val();

            formData.append('product_id', product_id);
            formData.append('sku', sku);
            formData.append('price', price);
            formData.append('sale_price', sale_price);
            formData.append('quantity', quantity);
            if (is_default) {
                formData.append('is_default', is_default);
            }
            formData.append('image', image);

            $(".attributes").each((id, element) => {
                attribute_id = element.id;
                attribute_value_id = element.value;
                formData.append(`product_attributes[${attribute_id}]`, attribute_value_id);
            });
            fetchData(url, formData, method = 'POST')
                .then((result) => {
                    if (result.status == 201) {
                        const appendData = () => {
                            result.data.then((resultData) => {
                                productSku = resultData.data;
                                item_sku = `<tr id="${productSku.id}">
                                              <td><img src="${productSku.image}" alt=""></td>`;
                                productSku.sku_values.forEach(function (item) {
                                    item_sku += `<td>${item.attribute_value}</td>`;
                                });
                                item_sku +=  `<td>${productSku.sale_price}</td>
                                              <td>${productSku.quantity}</td>
                                              <td>${productSku.sku}</td>
                                              <td>${productSku.is_default ? 'TRUE' : 'FALSE'}</td>
                                              <td class="text-center">
                                                <a class="btn btn-info btn-circle btn-edit-variant" data="${productSku.id}" data-toggle="modal" href="#product_sku_modal">Edit</a>
                                                <a class="btn btn-danger btn-circle btn-delete-variant" data="${productSku.id}" onclick="deleteVariant($(this))">Delete</a>
                                              </td>
                                            </tr>`;
                                 $("#list_product_sku").append(item_sku);
                            })
                        }

                        appendData();
                        $("#product_sku_modal").modal('hide');
                        toastr.success('Create variant successful!');
                    } else {
                        toastr.error('Create variant failed!');
                    }
                })
        })

        deleteVariant = (_this) => {
            product_sku_id = _this.attr('data');
            var state = confirm("Delete this variant?");
            console.log(product_sku_id);
            if (state) {
                url = '{{ route('api.v1.admin.product_skus.store',) }}/'+ product_sku_id;
                fetchData(url = url, data = {}, method = 'DELETE')
                    .then((response) => {
                        toastr.success('Delete variant successful');
                        $('#list_product_sku').find("#" + product_sku_id).remove();
                    });
            }
        }

        $(".btn-edit-variant").on('click', function () {
            product_sku_id = $(this).attr('data');
            $('#btn-save-variant').attr('onClick', 'updateVariant()');
            url = '{{ route('api.v1.admin.product_skus.store',) }}/'+ product_sku_id;

            fetchData(url = url, data = null, method = 'GET')
                .then((result) => {
                    if (result.status == 200) {
                        const showForm = () => {
                            result.data.then((resultData) => {
                                productSku = resultData.data;
                                if (productSku.is_default) {
                                    $('#is_default').parent().parent().removeClass('bootstrap-switch-off').addClass('bootstrap-switch-on');
                                } else {
                                    $('#is_default').parent().parent().removeClass('bootstrap-switch-on').addClass('bootstrap-switch-off');
                                }
                                $('#price').val(productSku.price);
                                $('#sale_price').val(productSku.sale_price);
                                $('#quantity').val(productSku.quantity);
                                $('#sku').val(productSku.sku);
                                productSku.sku_values.forEach(function (item) {
                                    $(`select[name="product_attributes[${item.attribute_id}]"]`).val(item.attribute_value_id);
                                });
                            })
                        }
                        showForm();
                    } else {
                        toastr.error('Fetch variant failed!');
                    }
            });
        })
	});

	async function fetchData(url = '', data = {}, method = 'POST') {
			const response = await fetch(url, {
                method: method,
                mode: 'cors',
                body: data
			});
		return {
            "data": response.json(),
            "status": response.status
        };
	}
</script>
