require('./bootstrap');
import io from 'socket.io-client'



let list = document.querySelector('#list')
let addUser = (user) => {
    let li = document.createElement('li')
    li.innerText = user.name
    li.id =  'user' + user.id
    list.appendChild(li)

}


if(list){
    let socket = io('http://localhost:3000')
    socket.on('connect',() => {

      socket.emit('identify',{

        token: list.dataset.token
      })
        })


        socket.on('users.new',({user}) => addUser(user) )

        socket.on('users',({users}) =>{

            for (let k in users) {
                
                addUser(users[k])
                
            }

        })

        socket.on('users.supp',({user})   =>{

            list.removeChild(document.querySelector('#user' + user.id))


        })


       
    
}


