let io = require('socket.io')(3000)

let jwt = require('jsonwebtoken')

let users = [] 

io.on('connection',socket => {

    let informatio_user = null

    socket.on('identify',({token})  => {
        
        try{
        let decode = jwt.verify(token,'demo',{

        algorithms : ['HS256']

        })
informatio_user = {
    id : decode.user_id,
    name: decode.user_name,
    count: 1
}

let user =  users.find(u => u.id  === informatio_user.id)

    if(user){user.count++}
    
    else{
    users.push(informatio_user)
    socket.broadcast.emit('users.new',{user:informatio_user})

}
socket.emit('users',{users})


} catch(e){
    console.error(e.message)
}
 })

 socket.on('disconnect', () => {

if (informatio_user) {
    let user =  users.find(u => u.id  === informatio_user.id)
    if (user) {
        user.count--     
    }
    if (user.count === 0 ) {
        users = users.filter(u => u.id !== informatio_user.id)
        socket.broadcast.emit('users.supp',{user : informatio_user}) 
    }

}

 })


    })

