<template>
  <div class="row">
    <div class="col-12">
      <div class="row margin-bottom">
        <div class="col-6">
          <filter-bar></filter-bar>
        </div>
        <div class="col-6">
          <length-menu :length="lengthMenu"></length-menu>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <vuetable
            ref="vuetable"
            :api-url="vtApiUrl"
            :fields="fields"
            pagination-path
            :css="css.table"
            :sort-order="sortOrder"
            :multi-sort="true"
            detail-row-component="my-detail-row"
            :append-params="moreParams"
            @vuetable:cell-clicked="onCellClicked"
            @vuetable:pagination-data="onPaginationData"
          ></vuetable>
          <div class="vuetable-pagination">
            <vuetable-pagination-info ref="paginationInfo" info-class="pagination-info"></vuetable-pagination-info>
            <vuetable-pagination
              ref="pagination"
              :css="css.pagination"
              @vuetable-pagination:change-page="onChangePage"
            ></vuetable-pagination>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import accounting from "accounting";
import moment from "moment";
import Vuetable from "vuetable-2/src/components/Vuetable";
import VuetablePagination from "vuetable-2/src/components/VuetablePagination";
import VuetablePaginationInfo from "vuetable-2/src/components/VuetablePaginationInfo";
import Vue from "vue";
import VueEvents from "vue-events";
import CustomActions from "./CustomActions";
import DetailRow from "./DetailRow";
import FilterBar from "./FilterBar";
import LengthMenu from "./LengthMenu";

Vue.use(VueEvents);
Vue.component("custom-actions", CustomActions);
Vue.component("my-detail-row", DetailRow);
Vue.component("filter-bar", FilterBar);
Vue.component("length-menu", LengthMenu);

export default {
  components: {
    Vuetable,
    VuetablePagination,
    VuetablePaginationInfo
  },
  props: {
    "vt-api-url": {
      type: String
    },
    "vt-fields": {
      type: Array
    },
    "vt-css": {
      type: Object
    },
    "vt-sort": {
      type: Array
    },
    "vt-params": {
      type: Object
    },
    "vt-length-menu": {
      type: Array
    },
    "vt-callback": {
      type: Function
    }
  },
  data() {
    return {
      fields: this.vtFields,
      css: this.vtCss,
      sortOrder: this.vtSort,
      moreParams: this.vtParams,
      lengthMenu: this.vtLengthMenu
    };
  },
  methods: {
    allcap(value) {
      return value.toUpperCase();
    },
    genderLabel(value) {
      return value === "M"
        ? '<span class="label label-success"><i class="glyphicon glyphicon-star"></i> Male</span>'
        : '<span class="label label-danger"><i class="glyphicon glyphicon-heart"></i> Female</span>';
    },
    formatNumber(value) {
      return accounting.formatNumber(value, 2);
    },
    formatDate(value, fmt = "D MMM YYYY") {
      value = new Date(value);
      return value == null ? "" : moment(value, "YYYY-MM-DD").format(fmt);
    },
    onPaginationData(paginationData) {
      this.$refs.pagination.setPaginationData(paginationData);
      this.$refs.paginationInfo.setPaginationData(paginationData);
    },
    onChangePage(page) {
      this.$refs.vuetable.changePage(page);
    },
    onCellClicked(data, field, event) {
      console.log("cellClicked: ", field.name);
      this.$refs.vuetable.toggleDetailRow(data.id);
    }
  },
  events: {
    "filter-set"(filterText) {
      this.moreParams = {
        filter: filterText,
        per_page: 5
      };
      Vue.nextTick(() => this.$refs.vuetable.refresh());
    },
    "filter-reset"() {
      this.moreParams = {};
      Vue.nextTick(() => this.$refs.vuetable.refresh());
    },
    "perpage-set"(pagelength) {
      this.moreParams = {
        per_page: pagelength
      };
      Vue.nextTick(() => this.$refs.vuetable.refresh());
    }
  },
  mounted() {
    this.vtCallback();

    // console.log(this.vtApiUrl, this.vtFields, this.vtCss, this.vtSort, this.vtParams, this.vtLengthMenu);
    // console.log(this.vtLengthMenu);
  }
};
</script>

<style lang="scss">
@import "../../sass/style.css";
// @import "../../../../public/assets/js/datatables/media/css/jquery.dataTables.min.css";
// @import "../../../../public/assets/_plugins/responsive.dataTable.css";
</style>


<style>
.pagination {
  margin: 0;
  float: right;
}
.pagination a.page {
  border: 1px solid lightgray;
  border-radius: 3px;
  padding: 5px 10px;
  margin-right: 2px;
}
.pagination a.page.active {
  color: white;
  background-color: #337ab7;
  border: 1px solid lightgray;
  border-radius: 3px;
  padding: 5px 10px;
  margin-right: 2px;
}
.pagination a.btn-nav {
  border: 1px solid lightgray;
  border-radius: 3px;
  padding: 5px 7px;
  margin-right: 2px;
}
.pagination a.btn-nav.disabled {
  color: lightgray;
  border: 1px solid lightgray;
  border-radius: 3px;
  padding: 5px 7px;
  margin-right: 2px;
  cursor: not-allowed;
}
.pagination-info {
  float: left;
}
</style>
