function connect(){
  return require('amqplib')
    .connect(process.env.AMQP)
    .then(conn => conn.createChannel())
}
 
function createQueue(channel, config, queue){
  return new Promise((resolve, reject) => {
    try{
      channel.assertQueue(queue, config);
      resolve(channel);
    }
    catch(err){ 
        reject(err) 
    }
  })
}
 
function producer(queue, config, message){
  connect()
    .then(channel => createQueue(channel, config, queue))
    .then(channel => channel.sendToQueue(queue, Buffer.from(JSON.stringify(message))))
    .catch(err => console.log(err))
}
 
function consumer(queue, config, callback){
  connect()
    .then(channel => createQueue(channel, config, queue))
    .then(channel => {
      console.log(" [*] Waiting for messages in %s.", queue);
      channel.consume(queue, callback, { noAck: true })
    })
    .catch(err => console.log(err));
}
 
module.exports = { producer, consumer }