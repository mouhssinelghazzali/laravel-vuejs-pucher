import User from './User';
class Exception {

    handle(error){
        this.isExpired(error.response.data.error)
        
    }
    isExpired(error){
        if (error == 'token is invalid') {
            User.logOut()
        }

    }
}
export default  Exception = new Exception()