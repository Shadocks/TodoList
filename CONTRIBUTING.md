## Contributing to TodoList

You want to contribute to TodoList, either to improve or to make us by a bug. This is where it goes. Here is the guideline we would like you to follow.

### Open an issue in the following situations:

- Report an error that you can not resolve.
- Suggest a new feature or idea for the project.

### Open a pull request in the following cases:

- Submit a correction (a typo, a broken link or an obvious error ...)
- Start working on a contribution already requested or that you have already decided in an issue.

## Pull Request

- First, you need to [fork the repository](https://guides.github.com/activities/forking/) and clone it locally.
- [Create a branch](https://guides.github.com/introduction/flow/) for your edits.
- Reference any relevant issues or supporting documentation in your PR
- Test your changes to make sure the project is not broken! Run your changes on the existing tests. If you have to create new ones.

## Tests

Run command `vendor/bin/simple-phpunit --coverage-html var/coverage`.

## Guidelines for commit message

*This part is a simplified extract from the angular/angular repository contribution file*

Each commit message consists of a **header**, a **body** and a **footer**. The header has a special format that includes a **type**, a **scope** and a **subject**:
```
<type>(<scope>): <subject>
<BLANK LINE>
<body>
<BLANK LINE>
<footer>
```
Insert a line break : `Maj+enter`

The **header** is mandatory and the **scope** of the header is optional.

Sample:
