export default class User {
    constructor(attributes = {}){
        Object.assign(this, attributes)
    }

    isALifer(){
        return false
    }
}
