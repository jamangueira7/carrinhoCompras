$(function() {
    function get_cep(cep) {
        var validacep = /^[0-9]{8}$/;

        //Valida o formato do CEP.
        if (validacep.test(cep)) {
            //Preenche os campos com "..." enquanto consulta webservice.
            $("#typePublicPlace").val("...");
            $("#inputLogradouro").val("...");
            $("#inputBairro").val("...");
            $("#inputCidade").val("...");
            $("#inputUF").val("...");

            //Consulta o webservice viacep.com.br/
            $.getJSON(
                "http://cep.republicavirtual.com.br/web_cep.php?formato=json&cep=" +
                    cep,
                function(dados) {
                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#typePublicPlace").val(dados.tipo_logradouro);
                        $("#inputLogradouro").val(dados.logradouro);
                        $("#inputBairro").val(dados.bairro);
                        $("#inputCidade").val(dados.cidade);
                        $("#inputUF").val(dados.uf);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        //limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                }
            );
        }
    }

    $(document).ready(function() {
        function Validacao() {
            var checkboxes = document.getElementsByName("opcaoDeficiencia");
            var numberOfCheckedItems = 0;

            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].checked) numberOfCheckedItems++;
            }
            if (numberOfCheckedItems > 1) {
                alert("Selecione somente uma opção");
                return false;
            }
        }

        $(window).on("load", function() {
            var natural = $("#inputNatu").val();

            if (natural == 1) {
                $(".militar").hide();
                $("#file_military").prop("required", null);
            } else {
                $(".militar").show();
                $("#file_military").prop("required", true);
            }
            if (natural == 1) {
                $(".elector_title").hide();
                $("#file_title").prop("required", null);
            } else {
                $(".elector_title").show();
                $("#file_title").prop("required", true);
            }

            var sexo = $("#sexo").val();

            if (sexo == 0) {
                $(".militar").show();
                $("#file_military").prop("required", true);
            } else if (sexo == 1 || sexo == 2) {
                $(".militar").hide();
                $("#file_military").prop("required", null);
            }
        });

        $("#inputNatu").change(function() {
            var natural = $(this).val();

            if (natural == 1) {
                $(".militar").hide();
                $("#file_military").prop("required", null);
            } else {
                $(".militar").show();
                $("#file_military").prop("required", true);
            }
            if (natural == 1) {
                $(".elector_title").hide();
                $("#file_title").prop("required", null);
            } else {
                $(".elector_title").show();
                $("#file_title").prop("required", true);
            }
        });

        if ($("#sexo").val() == 0) {
            $(".militar").show();
            $("#file_military").prop("required", true);
        }

        $("#sexo").change(function() {
            var sexo = $(this).val();

            if (sexo == 0) {
                $(".militar").show();
                $("#file_military").prop("required", true);
            } else if (sexo == 1 || sexo == 2) {
                $(".militar").hide();
                $("#file_military").prop("required", null);
            }
        });

        $("#inputCep").blur(function() {
            var strCep = $(this).val();
            var cep = strCep.replace("-", "");
            get_cep(cep);
        });

        $("#opcaoSim").click(function() {
            if ($(this).is(":checked")) {
                $(".deficiencia").show();
            } else {
                $(".deficiencia").hide();
            }
        });

        var enabled = false;
        if ($("#comentario").val()) {
            enabled = true;
        }
    });
});
