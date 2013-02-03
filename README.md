mno
===

### COMP4711 project - mno

## Useful Github commands

```git status``` - Shows any uncommitted changes that you have on your local branch

```git add <file>``` - Adds a file to be committed

```git commit -m "message"``` - Commits all added files to your local branch

```git pull origin``` - Pulls any updates from upstream to your local branch

```git push origin master``` - Pushes your changes upstream to the repository, make sure that you have pulled and are completely up to date before you push

```git stash``` - Store uncommitted changes on a stack so you can pull from upstream without committing

```git stash pop``` - Pop last stashed item

```git reset --hard HEAD``` - Resets all uncommitted work to the last check-in

```git checkout <file>``` - Resets a specific file to the last check-in

### If using the GUI

When a file is not being merged properly, to ensure your own copy is kept:   
```git add <file>``` - Keeps your local copy instead of attempting to merge differences between local and upstream

```git rebase --continue``` - Continue with synchronizing

If synchronizing does not work, this will force your changes upstream   
**Only use if you're sure your changes are correct**   
```git push --force origin master```

-----------
## Please refer to this section if you have commit issues

1. Go here and follow Windows instructions for **P4Merge: Visual Merge Tool**: http://www.perforce.com/downloads/complete_list
2. During installation, in Select Features, ensure that only **Visual Merge Tool (P4Merge)** is selected; all others should be X'd out
3. Navigate to the root directory of your local repo and edit your **.gitconfig** file to include the following:  
```    
    [merge] 

    tool = p4merge  
    [mergetool "p4merge"]  
    path = c:/Program Files/Perforce/p4merge.exe  
    trustExitCode = true
```
4. Save and exit, it should now be working. The command to merge files is:  
```git mergetool```

**Note:** The screen at the bottom is your result, so when you are happy with the changes, click save and it will commit that file for you  
**Note2:** Sometimes the .orig file will be held on to, this can be thrown away. Navigate to the file location after merging and delete it
