import AssignmentList from "./AssignmentList.js"

export default {
  template: `
    <h1 class="mb-8 text-2xl font-bold">Assignments</h1>

    <div class="space-y-6">
      <assignment-list title="Pending" :assignments="pending" />
      <assignment-list title="Completed" :assignments="completed" />
    </div>
  `,

  data() {
    return {
      assignments: [
        { id: 1, name: 'Finish project', completed: true },
        { id: 2, name: 'Read chapter 4', completed: false },
        { id: 3, name: 'Turn in homework', completed: false },
      ]
    }
  },

  computed: {
    completed() {
      return this.assignments.filter(a => a.completed)
    },

    pending() {
      return this.assignments.filter(a => !a.completed)
    }
  },

  components: {
    AssignmentList,
  }
}