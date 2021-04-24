<script>
	jQuery(document).ready(function() {
        $(document).on('click', '#btn-add-variant', function () {
            $('#btn-save-variant').removeClass('btn-update-variant').addClass('btn-create-variant');
            sku        = $("#sku").val('');
            price      = $("#price").val('');
            sale_price = $("#sale_price").val('');
            quantity   = $("#quantity").val('');
            image      = $("#image").val('');
        })

        $(document).on("click", ".btn-create-variant",function() {
            url        = '{{ route('api.v1.admin.product_skus.store') }}';
            const formData = new FormData();
            product_id = $("#product_id").val();
            sku        = $("#sku").val();
            price      = $("#price").val();
            sale_price = $("#sale_price").val();
            quantity   = $("#quantity").val();
            image      = $("#image")[0].files[0];

            formData.append('product_id', product_id);
            formData.append('sku', sku);
            formData.append('price', price);
            formData.append('sale_price', sale_price);
            formData.append('quantity', quantity);
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
                                sku_item = skuItem(productSku);
                                $("#list_product_sku").append(sku_item);
                                $(document).on('click', `.radio[data=${productSku.id}]`, function() {
                                    $(`.radio:not([data=${productSku.id}])`).children().removeClass('checked');
                                    $(this).children().addClass('checked');
                                    $(this).children().children().attr('checked');
                                });
                                $(document).on('click', `.radio:not([data=${productSku.id}])`, function() {
                                    $(`.radio[data=${productSku.id}]`).children().removeClass('checked');
                                });
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
            if (state) {
                url = '{{ route('api.v1.admin.product_skus.store',) }}/'+ product_sku_id;
                fetchData(url = url, data = {}, method = 'DELETE')
                    .then((response) => {
                        toastr.success('Delete variant successful');
                        $('#list_product_sku').find("#" + product_sku_id).remove();
                    });
            }
        }

        $(document).on('click', '.btn-edit-variant', function () {
            product_sku_id = $(this).attr('data');
            $('#btn-save-variant').removeClass('btn-create-variant').addClass('btn-update-variant');
            $('#product_sku_id').val(product_sku_id);
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

        $(document).on("click", ".btn-update-variant", function() {
            product_sku_id = $("#product_sku_id").val();
            url        = '{{ route('api.v1.admin.product_skus.store') }}/' + product_sku_id + '?_method=PUT';
            const formData = new FormData();
            sku        = $("#sku").val();
            price      = $("#price").val();
            sale_price = $("#sale_price").val();
            quantity   = $("#quantity").val();
            image      = $("#image")[0].files[0];

            formData.append('sku', sku);
            formData.append('price', price);
            formData.append('sale_price', sale_price);
            formData.append('quantity', quantity);
            if(image) {
                formData.append('image', image);
            }

            $(".attributes").each((id, element) => {
                attribute_id = element.id;
                attribute_value_id = element.value;
                formData.append(`product_attributes[${attribute_id}]`, attribute_value_id);
            });
            fetchData(url, formData, method = 'POST')
                .then((result) => {
                    if (result.status == 200) {
                        const appendData = () => {
                            result.data.then((resultData) => {
                                productSku = resultData.data;
                                sku_item = skuItem(productSku);
                                $('#list_product_sku').find("#" + product_sku_id).remove();
                                $("#list_product_sku").append(sku_item);
                            })
                        }

                        appendData();
                        $("#product_sku_modal").modal('hide');
                        toastr.success('Update variant successful!');
                    } else {
                        toastr.error('Update variant failed!');
                    }
                })
        })
	});

    const skuItem = (productSku) => {
        item_sku = `<tr id="${productSku.id}"><td><img src="${productSku.image}" alt=""></td>`;
        productSku.sku_values.forEach(function (item) {
            item_sku += `<td>${item.attribute_value}</td>`;
        });
        item_sku +=  `<td>${productSku.sale_price}</td>
                        <td>${productSku.quantity}</td>
                        <td>${productSku.sku}</td>
                        <td>
                          <label>
                            <div class="radio" data="${productSku.id}">
                              <span class="${productSku.is_default ? 'checked' : ''}">
                                <input type="radio" name="product[variantion_default_id]" ${productSku.is_default ? 'checked' : ''} value="{{ $product_sku->id }}">
                              </span>
                            </div>
                          </label>
                        </td>
                        <td class="text-center">
                        <a class="btn btn-info btn-circle btn-edit-variant" data="${productSku.id}" data-toggle="modal" href="#product_sku_modal">Edit</a>
                        <a class="btn btn-danger btn-circle btn-delete-variant" data="${productSku.id}" onclick="deleteVariant($(this))">Delete</a>
                        </td>
                    </tr>`;
        return item_sku;
    }

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
