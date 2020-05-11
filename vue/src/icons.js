import Vue from 'vue'
import { library } from '@fortawesome/fontawesome-svg-core'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
import { faUserSecret, faSpinner, faAngleRight, faUserFriends, faBoxOpen, faListAlt , faCartArrowDown, faHeart} from '@fortawesome/free-solid-svg-icons'

library.add(faUserSecret, faSpinner, faAngleRight, faUserFriends, faBoxOpen, faListAlt, faCartArrowDown, faHeart)

Vue.component('fa-icon', FontAwesomeIcon); 