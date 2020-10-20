
const Mask = {

    telefone(telefone) {
        let v = telefone;
        v=v.replace(/\D/g,"");                  // Remove tudo o que não é dígito
        v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); // Coloca parênteses em volta dos dois primeiros dígitos
        v=v.replace(/(\d)(\d{4})$/,"$1-$2");    // Coloca hífen entre o quarto e o quinto dígitos
        return v;
    },

    // 00000-000
    cep(cep) {
        let v = cep;
        v=v.replace(/\D/g,"");                  // Remove tudo o que não é dígito
        v=v.replace(/^(\d{5})(\d)/g,"$1-$2"); // Coloca parênteses em volta dos dois primeiros dígitos
        // v=v.replace(/(\d)(\d{4})$/,"$1-$2");    // Coloca hífen entre o quarto e o quinto dígitos
        return v;
    },

    placa(placa) {
        let v = placa;
        v=v.replace(/\W/g,"");                  // Remove tudo o que não é dígito
        v=v.replace(/^(\w{3})(\w)/g,"$1-$2");   // Coloca hífen depois dos tres primeiros dígitos
        return v.toUpperCase();
    },

    hora(hora) {
        let v = hora;
        v=v.replace(/\D/g,"");                  // Remove tudo o que não é dígito
        v=v.replace(/^(\d{2})(\d)/g,"$1:$2");   // Coloca barra depois dos dois primeiros dígitos
        return v;
    },

    number(value) {
        let v = value;
        v=v.replace(/\D/g,"");                  // Remove tudo o que não é dígito
        return v;
    },

    dataBR(data) {
        let v = data;
        v=v.replace(/\D/g,"");                  // Remove tudo o que não é dígito
        v=v.replace(/^(\d{2})(\d)/g,"$1/$2");   // Coloca barra depois dos dois primeiros dígitos
        v=v.replace(/(\d)(\d{4})$/,"$1/$2");    // Coloca barra depois dos quatro primeiros dígitos

        return v;
    },

    dataUS(data) {
        var dia  = data.split("/")[0];
        var mes  = data.split("/")[1];
        var ano  = data.split("/")[2];

        return ano + '-' + ("0"+mes).slice(-2) + '-' + ("0"+dia).slice(-2);
    },


    // 000.000.000-00
    maskCPF(cpf) {
        let v = cpf;
        v=v.replace(/\D/g,"") // Remove tudo o que não é dígito
        v=v.replace(/(\d{3})(\d)/,"$1.$2") // Coloca um ponto entre o terceiro e o quarto dígitos
        v=v.replace(/(\d{3})(\d)/,"$1.$2") // Coloca um ponto entre o terceiro e o quarto dígitos
        v=v.replace(/(\d{3})(\d{1,2})$/,"$1-$2") // Coloca um hífen entre o terceiro e o quarto dígitos
        return v;
    },

    // 00.000.000/0000-00
    maskCNPJ(cnpj) {
        let v = cnpj;
        v=v.replace(/\D/g,"") // Remove tudo o que não é dígito
        v=v.replace(/(\d{2})(\d)/,"$1.$2") // Coloca um ponto entre o terceiro e o quarto dígitos
        v=v.replace(/(\d{3})(\d)/,"$1.$2") // Coloca um ponto entre o terceiro e o quarto dígitos
        v=v.replace(/(\d{3})(\d)/,"$1/$2") // Coloca um ponto entre o terceiro e o quarto dígitos
        v=v.replace(/(\d{4})(\d)/,"$1-$2") // Coloca um ponto entre o terceiro e o quarto dígitos
        return v;
    },

    formatReal(valor, sigla = false) {
        if(!valor) return ''

        let v = valor.toString();

        v = v.replace(/\D/g,"") // Remove tudo o que não é dígito

        if( v.length > 2 ){
            v = v.replace(/([0-9]{2})$/g, ",$1");
        }

        if( v.length > 6 ){
            v = v.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
        }

        return sigla ? `R$ ${v}` : v;
    },

    kilometers(valor) {
        if(!valor) return ''

        let v = valor.toString();

        v = v.replace(/\D/g,"") // Remove tudo o que não é dígito

        if( v.length > 3 ){
            v = v.replace(/([0-9]{3})$/g, ".$1");
        }

        return v;
    },

    formatUS(valor) {
        let v = valor;
        v = v.replace(/\./g, "");
        v = v.replace(",", ".");

        return v
    },

    numeros(caracter) {
        let nTecla = 0;
        if (document.all) {
            nTecla = caracter.keyCode;
        } else {
            nTecla = caracter.which;
        }
        if ((nTecla > 47 && nTecla < 58)
            || nTecla === 8 || nTecla === 127
            || nTecla === 0 || nTecla === 9  // 0 == Tab
            || nTecla === 13) { // 13 == Enter
            return true;
        } else {
            return false;
        }
    },
}

export default Mask

