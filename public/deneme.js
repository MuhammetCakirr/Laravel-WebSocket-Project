

setTimeout(() => {
    window.Echo.channel('create-order').listen('OrderCreated', (e) => {
        console.log(e);


    });
}, 1000);
