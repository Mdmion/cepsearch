$(document).ready(function () {

    let cidade = $("#cidade");
    let estado = $("#estado");
    let cep = $("#cep");
    let searchtype = $("#searchtype");
    let cepresponse = $("#cepresponse");
    let btncopia = $("#btncopia");
    let btnexport = $("#btnexport");
    let btnclear = $("#btnclear");
    let iframe = $("iframe");
    let div = $("#showaddress");
    let btnsubmit = $("#btnsubmit");
    let formCep = $("#searchcep");

    //Buscar CEP
    formCep.submit(function (e) {
        e.preventDefault();

        let formData = $(this).serialize();
        let method = $(this).attr("method");
        let url = $(this).attr("action");
        let result_formated = [];

        $.ajax({
            method: method,
            url: url,
            dataType: "json",
            data: formData,
            beforeSend: function () {
                $("body").addClass("loading");
                btnsubmit.prop('disabled', true);
            },
            success: function (data) {

                if (data.error) {

                    Erro.fire({
                        title: data.error
                    });
                    resetResponse();
                }
                if (data.success) {

                    // let result = JSON.parse(data.response);

                    Successo.fire({
                        title: "Cep encontrado com sucesso"
                    })
                    iframe.fadeIn("slow", function () {
                        $(this).prop('src', data.googlemaps).attr('src', function (i, val) {
                            return val;
                        });

                    });
                    cepresponse.typed({
                        strings: [data.response],
                        typeSpeed: 1,
                    });
                    btncopia.prop('disabled', false);
                    btnexport.prop('disabled', false);
                    btnclear.removeClass('disabled');
                    $("#txtresponse").val(data.response);
                }
            },
            complete: function () {
                $("body").removeClass("loading");
                btnsubmit.prop('disabled', false);
            },
            error: function () {
                Erro.fire({
                    title: "Erro ao processar Requisição"
                });
                resetResponse();
            }
        });
    });

    btnclear.on("click",function(){
        resetResponse(true);
    });

    //select tipo de pesquisa
    searchtype.on("change", function () {
        let val = $(this).val();
        getaddress(val);

    });

    cidade.on("change", function () {

        let proName = $(this).val();
        let value = $('#cidades option').filter(function () {
            return this.value === proName;
        }).data('value');

        $.ajax({
            type: 'POST',
            url: fetchstate,
            dataType: "json",
            data: {
                id: value
            },
            success: function (data) {
                estado.val(data.response);
            }
        });
    });

    btncopia.on("click", function () {

        let cepresponse_copy = document.getElementById("cepresponse").innerHTML;

        if (!navigator.clipboard) {
            // use old commandExec() way
            cepresponse_copy.select();
            cepresponse_copy.setSelectionRange(0, 99999);
            let copy = document.execCommand("copy");
            if (copy) {
                Successo.fire({
                    title: 'Copiado com sucesso!'
                });
            } else {
                Erro.fire({
                    title: 'Erro ao copiar, seu navegador pode não ter suporte a essa função.'
                });
            }
        } else {
            navigator.clipboard.writeText(cepresponse_copy).then(
                function () {
                    Successo.fire({
                        title: 'Copiado com sucesso!'
                    });
                })
                .catch(
                    function () {
                        Erro.fire({
                            title: 'Erro ao copiar, seu navegador pode não ter suporte a essa função.'
                        });
                    }
                );
        }

    });
    function getaddress(option){

        if (option == 1) {
            div.fadeOut("slow", function () {
                cidade.prop('disabled', true,).prop('placeholder', '');
                estado.prop('disabled', true,).prop('placeholder', '');
                cep.prop('value', '').typed({
                    strings: ['Digite o CEP'],
                    typeSpeed: 0,
                    backSpeed: 0,
                    attr: 'placeholder',
                    bindInputFocusEvents: true,
                }).prop('value', '');
            });
            return;
        }

        div.fadeOut("slow", function () {
            div.fadeIn("slow", function () {

                cidade.prop('value', '').prop('disabled', false).typed({
                    strings: ['Cidade'],
                    typeSpeed: 0,
                    backSpeed: 0,
                    attr: 'placeholder',
                    bindInputFocusEvents: true,
                });

                estado.prop('value', '').prop('disabled', false).typed({
                    strings: ['UF'],
                    typeSpeed: 0,
                    backSpeed: 0,
                    attr: 'placeholder',
                    bindInputFocusEvents: true,
                });

                cep.prop('value', '').typed({
                    strings: ['Digite o Endereço'],
                    typeSpeed: 0,
                    backSpeed: 0,
                    attr: 'placeholder',
                    bindInputFocusEvents: true,
                });
            });
        });
    }

    function resetResponse(options = null) {

        if(options != null){
            Successo.fire({
                title: 'Formulário limpo com sucesso'
            });
        }

        formCep.trigger("reset");
        iframe.fadeTo("slow", 0.7, function () {
            $(this).prop('src', '');
            $(this).fadeTo("slow", 1);
        });
        cepresponse.fadeTo("slow", 0.7, function () {
            $(this).typed({
                strings: [""],
                typeSpeed: 1,
            });
            $(this).fadeTo("slow", 1);
        });
        btncopia.prop('disabled', true);
        btnexport.prop('disabled', true);
        btnclear.addClass('disabled');

    }
});
