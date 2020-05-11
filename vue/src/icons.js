import Vue from 'vue'
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faUserSecret, 
        faSpinner, 
        faAngleRight, 
        faUserFriends, 
        faBoxOpen, 
        faListAlt , 
        faCartArrowDown, 
        faHeart,
        faPencilAlt,
        faTrashAlt,
        faPlusCircle,
        faCheckCircle
    } from '@fortawesome/free-solid-svg-icons'

library.add(faUserSecret, 
        faSpinner, 
        faAngleRight, 
        faUserFriends, 
        faBoxOpen, 
        faListAlt, 
        faCartArrowDown, 
        faHeart,
        faPencilAlt,
        faTrashAlt,
        faPlusCircle,
        faCheckCircle
    )

Vue.component('fa-icon', FontAwesomeIcon); 