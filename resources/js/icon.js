import Vue from 'vue'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faSpinner, faUserSecret } from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import { faAddressCard } from '@fortawesome/free-solid-svg-icons'

import { dom } from '@fortawesome/fontawesome-svg-core'

dom.watch()

import { faChessQueen } from '@fortawesome/free-solid-svg-icons'


import { faFontAwesome } from '@fortawesome/free-brands-svg-icons'





library.add(faUserSecret, faSpinner)
library.add(faFontAwesome)
library.add(faAddressCard)
library.add(faChessQueen)

Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.component('fa-icon', FontAwesomeIcon)



