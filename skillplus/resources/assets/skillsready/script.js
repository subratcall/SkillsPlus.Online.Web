// console.log(__dirname);
require('jquery.nicescroll');
require('tooltip');

import "datatables.net";

Vue.component('article-index', require('../skillsready/admin_user/article/index.vue'));
Vue.component('my-vuetable', require('../skillsready/components/MyVuetable.vue'));