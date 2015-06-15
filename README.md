# README #
Author: Kavy Rattana

This is generally, how you would go about using Bitbucket. Read up on the commands:
https://www.atlassian.com/git/tutorials/

### Anatomy of a Pull Request ###
A developer creates the feature in a dedicated branch in their local repo.
The developer pushes the branch to a public Bitbucket repository.
The developer files a pull request via Bitbucket.
The rest of the team reviews the code, discusses it, and alters it.
The project maintainer merges the feature into the official repository and closes the pull request.

## Breakdown of Commands ###
First clone the repository to your local machine.
You may also use SourceTree, if you prefer a GUI.
Navigate to an empty folder then run the commands:
```
git init
git clone https://Krattana@bitbucket.org/hawkoverflow/hawkoverflow.git <local directory path>
```
Now you should have a local copy of the repository
Create a branch from master.

```
git branch -d <branch>
```
Commiting and pushing changes to the repository
```
git init
git add README.md
git commit -m "first commit"
git remote add origin git@bitbucket.org:hawkoverflow/hawkoverflow.git
git push -u origin master
```

## Push existing directory to the remote repo ###
```
git remote add origin git@bitbucket.org:hawkoverflow/hawkoverflow.git
git push -u origin master
```
### Use this command when putting your changes to the top of the queue. ###
```
git checkout master
git pull --rebase origin
