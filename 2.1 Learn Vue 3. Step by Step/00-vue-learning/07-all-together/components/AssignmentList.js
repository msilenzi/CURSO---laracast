import AssignmentListItem from "./AssignmentListItem.js"

export default {
  template: `
    <section>
      <h2 class="mb-2 text-xl font-bold">{{ title }}</h2>
      <ul v-if="assignments.length">
        <assignment-list-item 
          v-for="assignment in assignments"
          :key="assignment.id"
          :assignment="assignment"
        />
      </ul>
      <p v-else>There are no assignments</p>
    </section>
  `,

  props: {
    title: String,
    assignments: Array,
  },

  components: {
    AssignmentListItem,
  }
}