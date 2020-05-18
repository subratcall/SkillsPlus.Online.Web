<template>
  <div class="row">
    <div class="col-lg-12">
      <div class="row margin-bottom">
        <div class="col-lg-6">
          <filter-bar></filter-bar>
        </div>
        <div class="col-lg-6">
          <length-menu></length-menu>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <vuetable
            ref="vuetable"
            api-url="/admin/user_dashboard/request/article"
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
  data() {
    return {
      fields: [
        {
          name: "__sequence",
          title: "#",
          titleClass: "text-right",
          dataClass: "text-right"
        },
        {
          name: "__checkbox",
          titleClass: "text-center",
          dataClass: "text-center"
        },
        {
          name: "title",
          title: "Title",
          sortField: "title"
        },
        {
          name: "category",
          title: "Category",
          sortField: "category"
        },
        {
          name: "create_at",
          title: "Date",
          sortField: "create_at",
          titleClass: "text-center",
          dataClass: "text-center",
          callback: "formatDate|DD-MM-YYYY"
        },
        {
          name: "status",
          title: "Status",
          sortField: "status"
        },
        {
          name: "__component:custom-actions",
          title: "Actions",
          titleClass: "text-center",
          dataClass: "text-center"
        }
      ],
      css: {
        table: {
          tableClass:
            "table table-bordered table-striped table-hover display responsive nowrap",
          ascendingIcon: "glyphicon glyphicon-chevron-up",
          descendingIcon: "glyphicon glyphicon-chevron-down"
        },
        pagination: {
          wrapperClass: "pagination",
          activeClass: "active",
          disabledClass: "disabled",
          pageClass: "page",
          linkClass: "link",
          icons: {
            first: "",
            prev: "",
            next: "",
            last: ""
          }
        },
        icons: {
          first: "glyphicon glyphicon-step-backward",
          prev: "glyphicon glyphicon-chevron-left",
          next: "glyphicon glyphicon-chevron-right",
          last: "glyphicon glyphicon-step-forward"
        }
      },
      sortOrder: [{ field: "title", sortField: "title", direction: "asc" }],
      moreParams: {
        per_page: 5
      }
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
  }
};
</script>

  // <link href="{{ asset('assets/js/dataTables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet">
  // <link href="{{ asset('assets/_plugins/responsive.dataTable.css') }}" rel="stylesheet"> 


<style lang="scss">
@import "../../sass/style.css";
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
