import AssignmentListItem from "./AssignmentListItem.js"

export default {
  template: `
    <section>
      <h2 class="mb-2 text-xl font-bold">
        {{ title }}
        <span class="text-slate-500 text-sm"> ({{ assignments.length }})</span>
      </h2>
      <ul v-if="assignments.length" class="divide-y divide-slate-600 rounded-lg overflow-hidden">
        <assignment-list-item 
          v-for="assignment in assignments"
          :key="assignment.id"
          :assignment="assignment"
        />
      </ul>
      <p v-else class="text-slate-500 italic">There are no assignments</p>
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