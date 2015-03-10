#!/bin/sh

echo "[task] Generating application CRUD in docker container..."

docker-compose run --rm cli ./yii giiant-batch \
        --interactive=0 \
        --overwrite=1 \
        --enableI18N=1 \
        --messageCategory=app \
        --modelNamespace=app\\modules\\gitlab\\models \
        --crudControllerNamespace=app\\modules\\gitlab\\controllers \
        --crudSearchModelNamespace=app\\modules\\gitlab\\models\\search \
        --crudViewPath=@app/modules/gitlab/views \
        --crudPathPrefix= \
        --crudProviders=schmunk42\\giiant\\crud\\providers\\DateTimeProvider \
        --tables=application_settings,broadcast_messages,deploy_keys_projects,emails,events,forked_project_links,identities,issues,keys,label_links,labels,members,merge_request_diffs,merge_requests,milestones,namespaces,notes,oauth_access_grants,oauth_access_tokens,oauth_applications,projects,protected_branches,schema_migrations,services,snippets,taggings,tags,users,users_star_projects,web_hooks
