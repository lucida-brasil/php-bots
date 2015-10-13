'use strict';
let config = require('./config.json');
let VtexRequest = require('./vtexrequest.class');
let File = require('./file.class');
let json2csv = require('json2csv');

let timing = {
    start : new Date()
}

timing.startTimeStamp = timing.start.getTime();

let clientes = 0;
let produtos = 0;
let pedidos  = 0;

console.log('# INICIANDO PROCESSO DE EXTRAÇÃO #\n');

let r = new VtexRequest(
    config.apptoken,
    config.appkey,
    'boticario',
    120000
    , true
);

let ordersFile   = new File( 'csv/orders.csv', timing.startTimeStamp );
let productsFile = new File( 'csv/products.csv', timing.startTimeStamp );
let clientsFile  = new File( 'csv/clients.csv', timing.startTimeStamp );

r.getOrdersByDate(
    new Date(2015, 8, 13), // Data inicial
    new Date(2015, 10, 13), // Data final
    function(err, data) { // Callback com todos os pedidos
        timing.end  = new Date();
        let endms   = timing.end.getTime();
        let startms = timing.start.getTime();
        let minutes = Math.round(((endms - startms)/1000)/60);
        console.log(`${data.length} pedidos baixados em ${minutes.toFixed(2)} minutos.`);
     }
    ,
    function(pedido) { // Callback para cada um dos pedidos

        pedido.userProfileId = pedido.clientProfileData.userProfileId;
    
        clientsFile.writeLine(pedido.clientProfileData); //salva o pedido no arquivo
        delete pedido.clientProfileData; //remove cliente do pedido
    
        pedido.items.forEach((produto) => {
            produto.orderId = pedido.orderId;
            productsFile.writeLine(produto); //salva o produto no arquivo
            produtos++;
        });
    
        delete pedido.items; //remove produtos do pedido
    
        ordersFile.writeLine(pedido); //salva o produto no arquivo
    
        pedidos++;
        clientes++;

        console.log(pedidos, ' pedidos');
        console.log(clientes, ' clientes');
        console.log(produtos, ' produtos');
    
    }
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
