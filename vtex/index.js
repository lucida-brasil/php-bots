'use strict';
let fs = require('fs');
let config = require('./config.json');
let VtexRequest = require('./vtexrequest.class');

let timing = {
    start : new Date()
}

let clientes = [];
let produtos = [];
let pedidos  = [];

console.log('# INICIANDO PROCESSO DE EXTRAÇÃO #\n');

let r = new VtexRequest(
    config.apptoken,
    config.appkey,
    'boticario',
    120000
    , true
);

r.getOrdersByDate(
    new Date(2015, 8, 1), // Data inicial
    new Date(2015, 8, 8), // Data final
    function(err, data) { // Callback com todos os pedidos
        timing.end  = new Date();
        let endms   = timing.end.getTime();
        let startms = timing.start.getTime();
        let minutes = Math.round(((endms - startms)/1000)/60);
        console.log(`${data.length} pedidos baixados em ${minutes.toFixed(2)} minutos.`);
     }
    // ,
    // function(pedido) { // Callback para cada um dos pedidos
    //
    //     pedido.userProfileId = pedido.clientProfileData.userProfileId;
    //
    //     clientes.push(pedido.clientProfileData); //adiciona cliente ao vetor de clientes
    //     delete pedido.clientProfileData; //remove cliente do pedido
    //
    //     pedido.items.forEach((produto) => {
    //         produto.orderId = pedido.orderId;
    //         produtos.push(produto); //adiciona produto ao vetor de produto
    //     });
    //
    //     delete pedido.items; //remove produtos do pedido
    //
    //     pedidos.push(pedido); //adiciona pedido ao vetor de pedido
    //
    //     console.log(pedidos.length, ' pedidos');
    //     console.log(clientes.length, ' clientes');
    //     console.log(produtos.length, ' produtos');
    //
    // }
);


// r.getOrderIds(
//     new Date(2015, 8, 1),
//     new Date(2015, 8, 2),
//     function(err, data) {
//         console.log(err);
//         console.log('--------------');
//         console.log(data);
//     }
// );

// r.getOrder('v5366857bot-01', function(err, data){
//     console.log(err);
//     console.log('--------------');
//     console.log(data);
// });
