
    let cidade = $("#cidade");
    let estado = $("#estado");
    let cep = $("#cep");
    let cepresponse = $("#cepresponse");
    let btncopia = $("#btncopia");
    let btnexport = $("#btnexport");
    let iframe = $("iframe");
    let div = $("#showaddress");

    function getaddress(option) {

        if (option == 1) {
            div.fadeOut("slow", function () {
                cidade.prop('disabled', true,).prop('placeholder', '');
                estado.prop('disabled', true,).prop('placeholder', '');
                cep.typed({
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

                cidade.prop('disabled', false).typed({
                    strings: ['Cidade'],
                    typeSpeed: 0,
                    backSpeed: 0,
                    attr: 'placeholder',
                    bindInputFocusEvents: true,
                });

                estado.prop('disabled', false).typed({
                    strings: ['UF'],
                    typeSpeed: 0,
                    backSpeed: 0,
                    attr: 'placeholder',
                    bindInputFocusEvents: true,
                });

                cep.typed({
                    strings: ['Digite o Endereço'],
                    typeSpeed: 0,
                    backSpeed: 0,
                    attr: 'placeholder',
                    bindInputFocusEvents: true,
                }).prop('value', '');
            });
        });
    }

    function resetResponse() {

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
    }
