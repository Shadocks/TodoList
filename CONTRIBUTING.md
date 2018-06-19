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
<type>: <subject>
<BLANK LINE>
<body>
<BLANK LINE>
<footer>
```
Insert a line break : `Maj+enter`

Sample:
```
bug: response header 201 not location key

Update project dependencies
The empty cache and a change of environment (prod to dev)
Add onKernelResponse method to UserSubscriber.php

Closes #12
```

### Type
Must be one of the following:

- **build**: Changes that affect the build system or external dependencies
- **docs**: Documentation only changes
- **feat**: A new feature
- **fix**: A bug fix
- **perf**: A code change that improves performance
- **refactor**: A code change that neither fixes a bug nor adds a feature
- **style**: Changes that do not affect the meaning of the code (white-space, formatting, missing semi-colons, etc)
- **test**: Adding missing tests or correcting existing tests

### Subject
The subject contains a succinct description of the change:

- don't capitalize the first letter
- no dot (.) at the end

### Body
The body should include the motivation for the change and contrast this with previous behavior.

### Footer
The footer should reference the GitHub problems that this commit closes or if the issue is in progress and it is an intermediate commit mark: `In progress #12`.

## Good practices
Try to respect as much as possible the good practices put in places.

The todolist project uses php.cs.fixer to ensure PSR compliance.
It also uses CodeClimate as well as Codacy to have a quality code.

### Analyses static
[Phpmetrics](https://github.com/phpmetrics/PhpMetrics) also provides metrics for the entire project as well as classes.
[Deptrac](https://github.com/sensiolabs-de/deptrac) apply rules for dependencies between different classes and check if they are not violated

#

The TodoList team thanks you in advance for your future contributions. If you do not have an immediate response, do not worry, we may be busy at the time of your request. In a normal context we respond within 5 days.
